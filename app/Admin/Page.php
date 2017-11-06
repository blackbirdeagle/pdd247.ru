<?php
Admin::model('\App\Page')->title('Страницы')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('id_text')->label('Идентификатор'),
		Column::string('name')->label('Название'),
        Column::string('keywords')->label('Ключевые слова'),
        Column::string('description')->label('Описание'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
        FormItem::text('id_text', 'Идентификатор')->required()->unique(),
		FormItem::text('name', 'Название'),
        FormItem::textarea('keywords', 'Ключевые слова'),
        FormItem::textarea('description', 'Описание'),
	]);
	return $form;
});