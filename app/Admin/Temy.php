<?php
Admin::model('\App\Temy')->title('Темы')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('id')->label('id темы'),
		Column::string('name')->label('Название темы'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Название темы')->required()->unique(),
		FormItem::textarea('keywords', 'Ключевые слова'),
		FormItem::textarea('description', 'Описание'),
		FormItem::text('seokey', 'Сео-ключ')->required(),
	]);
	return $form;
});