<?php

declare(strict_types=1);

namespace Upcloud\Tests\Api\Fixtures;

use Upcloud\ApiClient\Model\AddIpRequest;
use Upcloud\ApiClient\Model\AssignIpResponse;
use Upcloud\ApiClient\Model\IpAddress;
use Upcloud\ApiClient\Model\IpAddressListResponse;
use Upcloud\ApiClient\Model\ModifyIpRequest;

class IPAddressApiFixture extends BaseFixture
{

    public $ip = '10.0.0.1';

    /**
     * @return string
     */
    public function getResponseBody(): string
    {
        return json_encode($this->getList(), JSON_PRETTY_PRINT);
    }

    /**
     * @param int $fromListIndex
     * @return string
     */
    public function getResponseBodyByIndex(int $fromListIndex = 0): string
    {
        return json_encode(
            [
                'ip_address' => $this->getByIndex($fromListIndex)
            ],
            JSON_PRETTY_PRINT
        );
    }

    /**
     * @return IpAddressListResponse|mixed
     */
    public function getResponse()
    {
        return $this->serializer->deserialize(
            $this->getResponseBody(),
            IpAddressListResponse::class
        );
    }

    /**
     * @param int $fromListIndex
     * @return AddIpRequest
     */
    public function getRequestSuccess($fromListIndex = 0): AddIpRequest
    {
        return  new AddIpRequest([
            'ip_address' => $this->getItem($fromListIndex),
        ]);
    }

    /**
     * @param int $fromListIndex
     * @return ModifyIpRequest
     */
    public function getModifyRequestSuccess($fromListIndex = 0): ModifyIpRequest
    {
        return  new ModifyIpRequest([
            'ip_address' => $this->getItem($fromListIndex),
        ]);
    }

    /**
     * @param int $fromListIndex
     * @return AddIpRequest
     */
    public function getRequestFailed(int $fromListIndex = 0): AddIpRequest
    {
        return  new AddIpRequest([
            'ip_address' => $this->getItem($fromListIndex),
        ]);
    }

    /**
     * @param int $fromListIndex
     * @return ModifyIpRequest
     */
    public function getModifyRequestFailed($fromListIndex = 0): ModifyIpRequest
    {
        return  new ModifyIpRequest([
            'ip_address' => $this->getItem($fromListIndex),
        ]);
    }

    /**
     * @param int $fromListIndex
     * @return mixed
     */
    public function getResponseByIndex(int $fromListIndex = 0)
    {
        return $this->serializer->deserialize(
            $this->getResponseBodyByIndex($fromListIndex),
            AssignIpResponse::class
        );
    }

    /**
     * @param int $index
     * @return string[]|null
     */
    public function getByIndex(int $index)
    {
        return $this->getList()['ip_addresses']['ip_address'][$index] ?? null;
    }

    public function getItem($fromListIndex = 5)
    {
        return new IpAddress($this->getByIndex($fromListIndex));
    }

    public function getList()
    {
        return [
            'ip_addresses' => [
                'ip_address' => [
                    [
                        'access' => 'utility',
                        'address' => '10.0.0.0',
                        'family' => 'IPv4',
                        'ptr_record' => '',
                        'server' => '0053cd80-5945-4105-9081-11192806a8f7',
                        'mac' => 'mm:mm:mm:mm:mm:m1',
                        'floating' => 'no',
                        'zone' => 'fi-hel2',
                    ],
                    [
                        'access' => 'utility',
                        'address' => '10.0.0.1',
                        'family' => 'IPv4',
                        'ptr_record' => '',
                        'server' => '006b6701-55d2-4374-ac40-56cc1501037f',
                        'mac' => 'mm:mm:mm:mm:mm:m2',
                        'floating' => 'no',
                        'zone' => 'de-fra1',
                    ],
                    [
                        'access' => 'public',
                        'address' => 'x.x.x.x',
                        'family' => 'IPv4',
                        'part_of_plan' => 'yes',
                        'ptr_record' => 'x-x-x-x.zone.upcloud.host',
                        'server' => '0053cd80-5945-4105-9081-11192806a8f7',
                        'mac' => 'mm:mm:mm:mm:mm:m1',
                        'floating' => 'yes',
                        'zone' => 'de-fra1',
                    ],
                    [
                        'access' => 'public',
                        'address' => 'xxxx:xxxx:xxxx:xxxx:xxxx:xxxx:xxxx:xxxx',
                        'family' => 'IPv6',
                        'ptr_record' => 'xxxx-xxxx-xxxx-xxxx.v6.zone.upcloud.host',
                        'server' => '006b6701-55d2-4374-ac40-56cc1501037f',
                        'mac' => 'mm:mm:mm:mm:mm:m3',
                        'floating' => 'no',
                        'zone' => 'fi-hel1',
                    ],
                    [
                        'access' => 'utility',
                        'family' => 'IPv4',
                        'mac' => 'mm:mm:mm:mm:mm:m1',
                        'floating' => 'yes',
                    ]
                ]
            ]
        ];
    }
}
