<?php

/**
 * \AppserverIo\Appserver\Core\Api\Node\StorageNode
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/appserver
 * @link      http://www.appserver.io
 */

namespace AppserverIo\Appserver\Core\Api\Node;

use AppserverIo\Description\Annotations as DI;
use AppserverIo\Description\Api\Node\AbstractNode;
use AppserverIo\Psr\ApplicationServer\Configuration\StorageConfigurationInterface;

/**
 * DTO to transfer storage information.
 *
 * @author    Tim Wagner <tw@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io/appserver
 * @link      http://www.appserver.io
 */
class StorageNode extends AbstractNode implements StorageConfigurationInterface
{

    /**
     * The storage class name.
     *
     * @var string
     * @DI\Mapping(nodeType="string")
     */
    protected $type;

    /**
     * Array with the servers used by the storage.
     *
     * @var array
     * @DI\Mapping(nodeName="storageServers/storageServer", nodeType="array", elementType="AppserverIo\Appserver\Core\Api\Node\StorageServerNode")
     */
    protected $storageServers = array();

    /**
     * Initializes the storage configuration with the passed values.
     *
     * @param string $type           The manager class name
     * @param array  $storageServers The array with the storage servers
     */
    public function __construct($type = '', array $storageServers = array())
    {

        // initialize the UUID
        $this->setUuid($this->newUuid());

        // set the data
        $this->type = $type;
        $this->storageServers = $storageServers;
    }

    /**
     * Returns the nodes primary key, the name by default.
     *
     * @return string The nodes primary key
     * @see \AppserverIo\Description\Api\Node\AbstractNode::getPrimaryKey()
     */
    public function getPrimaryKey()
    {
        return $this->getType();
    }

    /**
     * Returns the class name.
     *
     * @return string The class name
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Returns the array with the servers used by the storage.
     *
     * @return array The servers used by the storage
     */
    public function getStorageServers()
    {
        return $this->storageServers;
    }
}
