<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Model;

use Webmozart\Assert\Assert;

class ServerLoginUser
{

    const CREATE_PASSWORD_YES = 'yes';
    const CREATE_PASSWORD_NO = 'no';

    /**
     * @var string
     */
    private $createPassword;

    /**
     * @var string|null
     */
    private $username;

    /**
     * @var ServerSshKey|null
     */
    private $sshKeys;

    /**
     * Constructor
     * @param mixed[] $data
     */
    public function __construct(array $data = null)
    {
        $this->setCreatePassword($data['create_password'] ?? self::CREATE_PASSWORD_YES);
        $this->setUsername($data['username'] ?? null);
        $this->setSshKeys($data['ssh_keys'] ?? null);
    }

    /**
     * @return string
     */
    public function getCreatePassword(): string
    {
        return $this->createPassword;
    }

    /**
     * @param string $createPassword
     * @return ServerLoginUser
     */
    public function setCreatePassword(string $createPassword): ServerLoginUser
    {
        Assert::oneOf($createPassword, [
            self::CREATE_PASSWORD_YES,
            self::CREATE_PASSWORD_NO
        ]);

        $this->createPassword = $createPassword;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     * @return ServerLoginUser
     */
    public function setUsername(?string $username): ServerLoginUser
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return ServerSshKey|null
     */
    public function getSshKeys(): ?ServerSshKey
    {
        return $this->sshKeys;
    }

    /**
     * @param ServerSshKey|array|null $sshKeys
     * @return ServerLoginUser
     */
    public function setSshKeys($sshKeys): ServerLoginUser
    {
        if (is_array($sshKeys)) {
            $this->sshKeys = new ServerSshKey($sshKeys);
        } else {
            $this->sshKeys = $sshKeys;
        }

        return $this;
    }

}
