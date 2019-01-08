<?php
Admin::model('\App\Banners')->title('Баннеры')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('id')->label('ID баннера'),
		Column::string('name')->label('Название баннера'),
		Column::image('image')->label('Изображение баннера'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Название баннера'),
		FormItem::text('link', 'Ссылка с баннера'),
		FormItem::image('image', 'Изображение баннера'),
		FormItem::checkbox('active', 'Активность'),
	]);
	return $form;
});