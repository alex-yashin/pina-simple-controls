<?php

namespace PinaSimpleControls;

use Pina\App;
use Pina\Controls\Components\ButtonRow;
use Pina\Controls\Components\PagingControl;
use Pina\Controls\Form\FilterForm;
use Pina\Controls\Form\FormFlagStatic;
use Pina\Controls\Form\FormInput;
use Pina\Controls\Form\FormRow;
use Pina\Controls\Form\FormSelect;
use Pina\Controls\Form\FormStatic;
use Pina\Controls\Record\BreadcrumbView;
use Pina\Controls\Record\RecordForm;
use Pina\Controls\Record\RecordView;
use Pina\Controls\Record\TableView;
use Pina\Controls\SidebarWrapper;
use Pina\Layouts\DefaultLayout;
use Pina\Menu\MainMenu;
use Pina\ModuleInterface;
use Pina\Menu\RouterSiblingMenu;

class Module implements ModuleInterface
{

    public function __construct()
    {
        App::singletons()->set(MainMenu::class, Menu\MainMenu::class);
        App::singletons()->set(RouterSiblingMenu::class, Menu\RouterSiblingMenu::class);

        App::container()->set(DefaultLayout::class, Layouts\MainLayout::class);

        App::container()->set(FormFlagStatic::class, Controls\FormFlagStatic::class);
        App::container()->set(TableView::class, Controls\ContextTableView::class);
        App::container()->set(RecordView::class, Controls\ContextRecordViewWithSidebar::class);
        App::container()->set(RecordForm::class, Controls\RecordFormWithSidebar::class);

        App::container()->set(FormRow::class, Controls\FormRow::class);
        App::container()->set(FormInput::class, Controls\FormInput::class);
        App::container()->set(FormStatic::class, Controls\FormStatic::class);
        App::container()->set(FormSelect::class, Controls\FormSelect::class);
        App::container()->set(ButtonRow::class, Controls\ButtonRow::class);
        App::container()->set(BreadcrumbView::class, Controls\Breadcrumb::class);
        App::container()->set(PagingControl::class, Controls\Pagination::class);
        App::container()->set(SidebarWrapper::class, Controls\SidebarWrapper::class);
        App::container()->set(FilterForm::class, Controls\PreviewedPopupFilterForm::class);
    }

    public function getPath()
    {
        return __DIR__;
    }

    public function getNamespace()
    {
        return __NAMESPACE__;
    }

    public function getTitle()
    {
        return 'SimpleControls';
    }

    public function http()
    {
        return [];
    }

}
