<?php

declare(strict_types=1);

namespace Upcloud\Tests\Model;

use PHPUnit\Framework\TestCase;

/**
 * StorageStateTest Class Doc Comment.
 *
 * @category    Class */
// * @description The storage state indicates the storage&#39;s current status. * &#x60;online&#x60; - The storage resource is ready for use. The storage can be attached or detached. * &#x60;maintenance&#x60; - Maintenance work is currently performed on the storage. The storage may have been newly created or it is being updated by some API operation. * &#x60;cloning&#x60; - The storage resource is currently the clone source for another storage. * &#x60;backuping&#x60; - The storage resource is currently being backed up to another storage. * &#x60;error&#x60; - The storage has encountered an error and is currently inaccessible.
/**
 * @internal
 */
class StorageStateTest extends TestCase
{
    /**
     * Test "StorageState".
     */
    public function testStorageState(): void
    {
    }
}
