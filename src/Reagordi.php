<?php

use Reagordi\Framework\Base\Applicaiton;
use Reagordi\Framework\Base\Security;
use Reagordi\Framework\Base\Options;
use Reagordi\Framework\Base\Context;
use Reagordi\Framework\Web\User;

class Reagordi
{
    /**
     * Экземпляр класса Reagordi
     *
     * @var Reagordi
     */
    public static $app;

    /**
     * Экземпляр класса Application
     *
     * @var Application
     */
    public $applicaiton;

    /**
     * Экземпляр класса Context
     *
     * @var Context
     */
    public $context;

    /**
     * Экземпляр класса Options
     *
     * @var Options
     */
    public $options;

    /**
     * Безопасность
     *
     * @var Security
     */
    public $security;

    /**
     * Пользователь
     *
     * @var User
     */
    public $user;

    /**
     * Компоненты CMS
     *
     * @var Reagordi\CMS\CMS
     */
    public $cms;

    /**
     * Reagordi constructor.
     */
    protected function __construct()
    {
        $this->applicaiton = Applicaiton::getInstance();
        $this->context = Context::getCurrent();
        $this->options = Options::getInstance();
        $this->security = Security::getInstance();
        $this->user = User::getInstance();
        if ( is_file( VENDOR_DIR . '/reagordi/cms/src/CMS.php' ) ) {
            require_once VENDOR_DIR . '/reagordi/cms/src/CMS.php';
            $this->cms = Reagordi\CMS\CMS::getInstance();
        }
    }

    /**
     * Returns current instance of the Reagordi.
     *
     * @return Reagordi
     */
    public static function getInstance()
    {
        if (self::$app === null) {
            self::$app = new Reagordi();
        }
        return self::$app;
    }
}
