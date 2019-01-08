<?php
Admin::model('\App\Listpunkt')->title('Список пунктов ПДД')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('name')->label('Наименование пункта'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
        FormItem::select('parent_id', 'Тема')->model('\App\Pdd')->display('name'),
		FormItem::text('name', 'Наименование пункта')->required()->unique(),
        FormItem::textarea('text', 'Текст пункта'),
	]);
	return $form;
});