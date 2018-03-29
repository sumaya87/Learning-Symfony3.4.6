<?php
/**
 * Created by PhpStorm.
 * User: sumaya
 * Date: 29/03/18
 * Time: 10:06 AM
 */

namespace AppBundle\Controller;

use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FormExampleController extends Controller
{
    /**
     * @Route("/form", name="form_example")
     */
    public function formExampleAction(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('personName', TextType::class)
            ->add('phoneNumber', NumberType::class)
            ->add('emailAddress', EmailType::class)
            ->add('submit', SubmitType::class, [
                'label' => 'Send',
                'attr'  => [
                    'class' => 'btn btn-success'
                ],
            ])
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $name = $form->getData()['personName'];
            $email = $form->getData()['emailAddress'];
            $this->sendMail($name, $email);
        }

        return $this->render('form-example/index.html.twig', [
            'myForm' => $form->createView(),
        ]);
    }

    public function sendMail($name, $email){

        $mail = \Swift_Message::newInstance()
            ->setSubject('Test Email')
            ->setFrom('mickey@mouse.com')
            ->setTo([$email => $name])
            ->setBody('Hello!');
        $this->get('mailer')->send($mail);
    }

}