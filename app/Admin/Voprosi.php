<?php
Admin::model('\App\Voprosi')->title('Вопросы')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('id')->label('ID вопроса'),
		Column::string('tema')->label('Тема'),
		Column::string('bilet')->label('Номер билета'),
		Column::string('poradok')->label('Номер вопроса'),
		Column::image('image')->label('Изображение вопроса'),
		Column::string('name')->label('Формулировка вопроса'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::textarea('name', 'Формулировка вопроса'),
		FormItem::multiselect('tema', 'Тема вопроса')->model('\App\Temy')->display('name'),
		FormItem::select('bilet', 'Принадлежит билету')->model('\App\Bileti')->display('name'),
		FormItem::text('poradok', 'Номер вопроса'),
		FormItem::image('image', 'Изображение вопроса'),
		FormItem::textarea('otvet', 'Комментарий ответа из ПДД'),
	]);
	return $form;
});