<?php

use Cake\Core\Configure;
use Cake\Event\EventManager;
use WyriHaximus\TwigView\Event;

EventManager::instance()->on(new Event\ExtensionsListener());
EventManager::instance()->on(new Event\TokenParsersListener());

if (Configure::read('debug')) {
    Configure::write('DebugKit.panels', array_merge(
        (array)Configure::read('DebugKit.panels'),
        [
            'WyriHaximus/TwigView.Twig',
        ]
    ));
    EventManager::instance()->on(new Event\ProfilerListener());
}
