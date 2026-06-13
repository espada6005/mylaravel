<?php

namespace App\Http\Controllers;

use App\Facades\Uuid;
use App\Services\MyService;
use App\Services\UuidInterface;
use App\Services\UuidService;
use Illuminate\Container\Attributes\Tag;

class CycleController extends Controller
{
    public function srv(UuidInterface $srv)
        // public function srv(UuidService $srv)
    {
        return 'Service ID: ' . $srv->getId();
    }

    public function srvMulti(UuidInterface $srv1)
    {
        $srv2 = app(UuidInterface::class);
        return 'Service1 ID: ' . $srv1->getId() . '<br />' .
            'Service2 ID: ' . $srv2->getId();
    }

    public function srvMy(MyService $srv)
    {
        return 'Service Type: ' . $srv->getType();
        // return 'Service Type: ' . $srv->getServiceType() . '<br />' .
        //     'Generated ID: ' . $srv->generateId();
    }


    public function srvTag(#[Tag('messages')] iterable $messages)
    {
        $result = [];
        foreach ($messages as $message) {
            $result[] = 'Message: ' . $message->getMessage();
        }
        return implode('<br />', $result);
    }

    public function facadeBasic()
    {
        return 'Facade ID: ' . Uuid::getId();
    }
}
