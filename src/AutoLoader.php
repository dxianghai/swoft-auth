<?php declare(strict_types=1);

namespace Allen\Swoft\Auth;

use Swoft\Helper\ComposerJSON;
use Swoft\SwoftComponent;
use function dirname;

/**
 * Class AutoLoader
 */
class AutoLoader extends SwoftComponent
{
    /**
     * Get namespace and dir
     *
     * @return array
     * [
     *     namespace => dir path
     * ]
     */
    public function getPrefixDirs(): array
    {
        return [
            __NAMESPACE__ => __DIR__,
        ];
    }

    /**
     * @return array
     */
    public function beans(): array
    {
        return [
            'auth'      => [
                'class'  => JWT::class,
                'dsn'    => 'mysql:dbname=dbname;host=127.0.0.1',
                'config' => [
                    // fetch array
                ],
            ]
        ];
    }
    /**
     * Metadata information for the component.
     *
     * @return array
     * @see ComponentInterface::getMetadata()
     */
    public function metadata(): array
    {
        $jsonFile = dirname(__DIR__) . '/composer.json';

        return ComposerJSON::open($jsonFile)->getMetadata();
    }
}
