<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerZmaxvyn\appProdProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerZmaxvyn/appProdProjectContainer.php') {
    touch(__DIR__.'/ContainerZmaxvyn.legacy');

    return;
}

if (!\class_exists(appProdProjectContainer::class, false)) {
    \class_alias(\ContainerZmaxvyn\appProdProjectContainer::class, appProdProjectContainer::class, false);
}

return new \ContainerZmaxvyn\appProdProjectContainer(array(
    'container.build_hash' => 'Zmaxvyn',
    'container.build_id' => '8a03e61a',
    'container.build_time' => 1522108283,
));
