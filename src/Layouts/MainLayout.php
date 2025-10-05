<?php

namespace PinaSimpleControls\Layouts;


use Pina\App;
use Pina\Controls\Nav\Nav;
use Pina\Html;
use Pina\Layouts\DefaultLayout;
use Pina\Menu\MainMenu;
use PinaSimpleControls\Menu\MobileBurger;

class MainLayout extends DefaultLayout
{

    protected function drawHeader()
    {
        return $this->drawSystemAlert() . parent::drawHeader();
    }

    protected function drawMainMenu()
    {
        return parent::drawMainMenu() . $this->drawMobileBurger();
    }

    protected function drawMobileBurger()
    {
        /** @var Nav $burger */
        $burger = App::make(MobileBurger::class);

        /** @var MainMenu $mainMenu */
        $mainMenu = clone App::load(MainMenu::class);
        $mainMenu->removeClass('bar');
        $mainMenu->removeClass('desktop');
        $mainMenu->addClass('columned');

        $burger->prependDropdown('☰', $mainMenu);

        return $burger;
    }

    protected function drawSystemAlert()
    {
        $alert = $_ENV['system_alert'] ?? '';
        if (empty($alert)) {
            return '';
        }

        return Html::nest('.alert alert-danger/.container', $alert);
    }

    /**
     * @throws \Exception
     */
    protected function loadResources()
    {
        App::assets()->addStyle('/vendor/simple-css-styles/vendor/normalize.css');

        App::assets()->addScript('/vendor/simple-css-styles/src/pn.js');
        App::assets()->addScript('/vendor/simple-css-styles/src/zz.js');
        App::assets()->addScript('/vendor/simple-css-styles/src/ajax.js');

        App::assets()->addScript('/vendor/simple-css-styles/src/form/form.js');
        App::assets()->addScript('/vendor/simple-css-styles/src/overlay/overlay.js');
        App::assets()->addScript('/vendor/simple-css-styles/src/form/textarea.js');
    }
}