<?php

namespace PinaSimpleControls;

use Pina\App;
use Pina\Controls\BreadcrumbView;
use Pina\Controls\ButtonRow;
use Pina\Controls\FilterForm;
use Pina\Controls\FormInput;
use Pina\Controls\FormRow;
use Pina\Controls\FormSelect;
use Pina\Controls\FormStatic;
use Pina\Controls\Nav;
use Pina\Controls\PagingControl;
use Pina\Controls\SidebarWrapper;
use Pina\ModuleInterface;

class Module implements ModuleInterface
{

    public function __construct()
    {
        App::container()->set(Nav::class, Controls\Nav::class);
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
