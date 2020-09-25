<?php

namespace App\Components;

use Collective\Html\FormBuilder;
use Illuminate\Support\Facades\View;

class Macros extends FormBuilder
{
    public function uploader($name, $rota, $identifier, $registro = null)
    {
        $dados['name'] = $name;
        $dados['rota'] = $rota;
        $dados['registro'] = $registro;
        $dados['identifier'] = $identifier;

        return View::make('admin.layouts.componente.forms.uploader', $dados);
    }

    public function cidades()
    {
        $dados["estado_id"] = !is_null(old("estado_id")) ? old("estado_id") : (isset($this->model) ? $this->model->estado_id : null);
        $dados["cidade_id"] = !is_null(old("cidade_id")) ? old("cidade_id") : (isset($this->model) ? $this->model->cidade_id : null);

        return View::make('admin.layouts.componente.forms.cidades', $dados);
    }

    public function formacaoInstituicaoCurso()
    {
        return View::make('admin.layouts.componente.forms.formacao-instituicao-curso');
    }

    public function localizacao()
    {
        return View::make('admin.layouts.componente.forms.selecionaLocalizacao');
    }

    public function money($colmdX, $name, $label, $options = array())
    {
        $dados['colmdx'] = $colmdX;
        $dados['name'] = $name;
        $dados['label'] = $label;
        $dados['options'] = $options;

        return View::make('admin.layouts.componente.forms.money-field', $dados);
    }

    public function datePicker($colmdX, $name, $label, $placeholder = "", $options = array())
    {
        $dados['colmdx'] = $colmdX;
        $dados['name'] = $name;
        $dados['label'] = $label;
        $dados['placeholder'] = $placeholder;
        $dados['options'] = $options;

        return View::make('admin.layouts.componente.forms.datepicker', $dados);
    }

    public function monthYearPicker($colmdX, $name, $label, $placeholder = "", $options = array(), $tooltip = array())
    {
        $dados['colmdx'] = $colmdX;
        $dados['name'] = $name;
        $dados['label'] = $label;
        $dados['placeholder'] = $placeholder;
        $dados['options'] = $options;

        if (!isset($tooltip["title"]))
        {
            $tooltip["title"] = null;
        }

        if (!isset($tooltip["message"]))
        {
            $tooltip["message"] = null;
        }

        if (!isset($tooltip["style"]))
        {
            $tooltip["style"] = null;
        }

        $dados['tooltip'] = $tooltip;

        return View::make('admin.layouts.componente.forms.date-month-year-picker', $dados);
    }

    public function botaoLink($colmdx, $texto, $rota, $icone = 'fa fa-check fa-2x', $ativo = true, $options = array())
    {
        $dados['colmdx'] = $colmdx;
        $dados['texto'] = $texto;
        $dados['rota'] = $rota;
        $dados['icone'] = $icone;
        $dados['options'] = $options;
        $dados['ativo'] = $ativo;

        return View::make('admin.layouts.componente.listagem.botaoLink', $dados);
    }

    public function select2($colmdX, $name, $label, $list, $placeholder = "Selecione", $options = array())
    {
        $dados['colmdx'] = $colmdX;
        $dados['name'] = $name;
        $dados['label'] = $label;
        $dados['list'] = $list;
        $dados['placeholder'] = $placeholder;
        $dados['options'] = $options;

        return View::make('admin.layouts.componente.forms.select2', $dados);
    }

    public function select2Tag($colmdX, $name, $label, $list, $placeholder = "Selecione", $options = array())
    {
        $dados['colmdx'] = $colmdX;
        $dados['name'] = $name;
        $dados['label'] = $label;
        $dados['list'] = $list;
        $dados['placeholder'] = $placeholder;
        $dados['options'] = $options;

        return View::make('admin.layouts.componente.forms.select2Tag', $dados);
    }

    public function select2Multiple($colmdX, $name, $label, $list, $selectedIds = null, $placeholder = "Selecione", $options = array())
    {
        $dados['colmdx'] = $colmdX;
        $dados['name'] = $name;
        $dados['label'] = $label;
        $dados['list'] = $list;
        $dados['selectedIds'] = $selectedIds;
        $dados['placeholder'] = $placeholder;
        $dados['options'] = $options;

        return View::make('admin.layouts.componente.forms.select2Multiple', $dados);
    }

    public function select2Ajax($colmdX, $name, $label, $list, $routeSearch, $placeholder = "Selecione", $minLength = 2, $options = array())
    {
        $dados['colmdx'] = $colmdX;
        $dados['id'] = preg_replace("/[^A-Za-z0-9_]/", '', $name);
        $dados['name'] = $name;
        $dados['label'] = $label;
        $dados['list'] = $list;
        $dados['placeholder'] = $placeholder;
        $dados['options'] = $options;
        $dados['minLength'] = $minLength;
        $dados['routeSearch'] = $routeSearch;

        return View::make('admin.layouts.componente.forms.select2Ajax', $dados);
    }

    public function select2AjaxMultiple($colmdX, $name, $label, $list, $routeSearch, $placeholder = "Selecione", $minLength = 2, $options = array())
    {
        $dados['colmdx'] = $colmdX;
        $dados['name'] = $name;
        $dados['label'] = $label;
        $dados['list'] = $list;
        $dados['placeholder'] = $placeholder;
        $dados['options'] = $options;
        $dados['minLength'] = $minLength;
        $dados['routeSearch'] = $routeSearch;

        return View::make('admin.layouts.componente.forms.select2AjaxMultiple', $dados);
    }

    public function myCheckbox($name, $label, $default = true)
    {
        $dados['name'] = $name;
        $dados['label'] = $label;
        $dados['id'] = preg_replace("/[^A-Za-z0-9_]/", '', $name);
        $dados['default'] = $default;

        return View::make('admin.layouts.componente.forms.my-checkbox', $dados);
    }
}
