<?php

declare(strict_types=1);

namespace Upcloud\Tests\Model;

use PHPUnit\Framework\TestCase;

/**
 * StorageTypeTest Class Doc Comment.
 *
 * @category    Class */
// * @description There are four different storage types: * &#x60;disk&#x60; (*Normal storages*) - Normal storage resources are used to store operating system and application data. This is the only user writeable storage type. * &#x60;cdrom&#x60; (*CD-ROMs*) - CD-ROM resources are used as a read-only media, typically for server installations or crash recovery. * &#x60;template&#x60; (*Templates*) - Templates are special storage resources which are used to create new servers with a preconfigured operating system. * &#x60;backup&#x60; (*Backups*) - Backups are storages containing a point-in-time backup of a normal storage. Data on a normal storage can be restored from one of its backups. Backups can also be cloned to create a new normal storage resource. Backups can be created manually or automatically using backup rules.
/**
 * @internal
 */
class StorageTypeTest extends TestCase
{
    /**
     * Test "StorageType".
     */
    public function testStorageType(): void
    {
    }
}
