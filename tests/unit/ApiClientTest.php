<?php

use PHPUnit\Framework\TestCase;

use UpCloud\ApiClient;

class ApiClientTest extends TestCase
{
  public function testInitialization()
  {
    $client = new ApiClient();
    $this->assertIsObject($client);
  }

  public function testMissingUsername()
  {
    $origUsername = getenv('UPCLOUD_USERNAME');
    putenv('UPCLOUD_USERNAME');

    try {
      new ApiClient();
    } catch (RuntimeException $e) {
      $this->assertStringContainsString('username missing', $e->getMessage());
      putenv("UPCLOUD_USERNAME=$origUsername");
    }
  }

  public function testMissingPassword()
  {
    $origPass = getenv('UPCLOUD_PASSWORD');
    putenv('UPCLOUD_PASSWORD');

    try {
      new ApiClient();
    } catch (RuntimeException $e) {
      $this->assertStringContainsString('password missing', $e->getMessage());
      putenv("UPCLOUD_PASSWORD=$origPass");
    }
  }

  public function testUsernameAndPassword()
  {
    $client = new ApiClient([
      'username' => 'testuser',
      'password' => 'Test_Secret',
    ]);
    $this->assertIsObject($client);
  }

  public function testInitializeWithCustomClient()
  {
    $httpClient = new class
    {
      public function request(string $_)
      {
        return 'hello!';
      }
    };

    $client = new ApiClient([
      'client' => $httpClient
    ]);

    $this->assertEquals($client->request('', '', ''), 'hello!');
  }
}
