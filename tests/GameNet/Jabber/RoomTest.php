<?php

/**
 * Class RoomTest
 *
 * @category GGS 
 * @package tests\GameNet\Jabber
 * @copyright Copyright (с), Syncopate Limited and/or affiliates. All rights reserved.
 * @author Vadim Sabirov <vadim.sabirov@syncopate.ru>
 * @version 1.0
 */
class RoomTest extends  PHPUnit_Framework_TestCase
{
    private $mock;

    public function setUp()
    {
        $this->mock = $this->getMockBuilder('\GameNet\Jabber\RpcClient')
            ->disableOriginalConstructor()
            ->setMethods(['sendRequest'])
            ->getMock();
    }

    public function testCreateRoom()
    {
        $this->mock->expects($this->once())
            ->method('sendRequest')
            ->with($this->equalTo('create_room'));

        $this->mock->createRoom('name');
    }

    public function testSendInviteToRoom()
    {
        $this->mock->expects($this->once())
            ->method('sendRequest')
            ->with($this->equalTo('send_direct_invitation'));

        $this->mock->sendInviteToRoom('name', 'password', 'reason', ['contact']);
    }

    public function testDeleteRoom()
    {
        $this->mock->expects($this->once())
            ->method('sendRequest')
            ->with($this->equalTo('destroy_room'));

        $this->mock->deleteRoom('name');
    }

    public function testGetRooms()
    {
        $this->mock->expects($this->once())
            ->method('sendRequest')
            ->with($this->equalTo('muc_online_rooms'));

        $this->mock->getRooms('name');
    }

    public function testSetRoomOption()
    {
        $this->mock->expects($this->once())
            ->method('sendRequest')
            ->with($this->equalTo('change_room_option'));

        $this->mock->setRoomOption('name', 'option', 'value');
    }

    public function testSetRoomAffiliation()
    {
        $this->mock->expects($this->once())
            ->method('sendRequest')
            ->with($this->equalTo('set_room_affiliation'));

        $this->mock->setRoomAffiliation('name', 'option', 'value');
    }
}
 