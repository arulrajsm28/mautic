<?php

/*
 * @copyright   2016 Mautic Contributors. All rights reserved
 * @author      Mautic
 *
 * @link        http://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

return [
    'routes' => [
        'main' => [
            'mautic_message_index' => [
                'path'       => '/messages/{page}',
                'controller' => 'MauticChannelBundle:Message:index',
            ],
            'mautic_message_action' => [
                'path'       => '/messages/{objectAction}/{objectId}',
                'controller' => 'MauticChannelBundle:Message:execute',
            ],
        ],
        'api' => [

        ],
        'public' => [

        ],
    ],

    'menu' => [
        'main' => [
            'mautic.channel.messages' => [
                'route'    => 'mautic_message_index',
                'access'   => ['channel:messages:viewown', 'channel:messages:viewother'],
                'parent'   => 'mautic.core.channels',
                'priority' => 100,
            ],
        ],
        'admin' => [

        ],
        'profile' => [

        ],
        'extra' => [

        ],
    ],

    'categories' => [
        'messages',
    ],

    'services' => [
        'events' => [

        ],
        'forms' => [
            \Mautic\ChannelBundle\Form\Type\MessageType::class => [
                'class'       => \Mautic\ChannelBundle\Form\Type\MessageType::class,
                'methodCalls' => [
                    'setSecurity' => ['mautic.security'],
                ],
                'arguments' => [
                    'mautic.channel.model.message',
                ],
            ],
        ],
        'others' => [
            'mautic.channel.helper.channel_list' => [
                'class'     => \Mautic\ChannelBundle\Helper\ChannelListHelper::class,
                'arguments' => [
                    'event_dispatcher',
                    'translator',
                ],
            ],
        ],
        'models' => [
            'mautic.channel.model.message' => [
                'class'     => \Mautic\ChannelBundle\Model\MessageModel::class,
                'arguments' => [
                    'mautic.channel.helper.channel_list',
                    'mautic.campaign.model.campaign',
                ],
            ],
            'mautic.channel.model.queue' => [
                'class'     => 'Mautic\ChannelBundle\Model\MessageQueueModel',
                'arguments' => [
                    'mautic.lead.model.lead',
                    'mautic.lead.model.company',
                ],
            ],
        ],
    ],

    'parameters' => [

    ],
];
