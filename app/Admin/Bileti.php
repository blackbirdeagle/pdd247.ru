<?php
Admin::model('\App\Bileti')->title('Билеты')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('name')->label('Название билета'),
		Column::string('keywords')->label('Ключевые слова'),
		Column::string('description')->label('Описание'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Название билета')->required()->unique(),
		FormItem::text('keywords', 'Ключевые слова'),
		FormItem::textarea('description', 'Описание'),
	]);
	return $form;
});