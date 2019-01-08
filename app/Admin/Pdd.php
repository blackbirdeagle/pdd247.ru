<?php
Admin::model('\App\Pdd')->title('ПДД 2017')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('name')->label('Название темы'),
        Column::string('seokey')->label('СЕО ключ'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Название темы')->required()->unique(),
        FormItem::text('keywords', 'Ключевые слова'),
        FormItem::text('description', 'СЕО-описание'),
        FormItem::text('seokey', 'СЕО ключ')->required()->unique(),
	]);
	return $form;
});