<?php
Admin::model('\App\Video')->title('Видео')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('name')->label('Название стастьи'),
		Column::string('keywords')->label('Ключевые слова'),
		Column::string('description')->label('Описание'),
        Column::string('seokey')->label('SEO-ключ'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Название статьи')->required()->unique(),
		FormItem::text('keywords', 'Ключевые слова'),
		FormItem::textarea('description', 'Описание'),
        FormItem::text('h1', 'Заголовок h1'),
        FormItem::textarea('text', 'Текст статьи'),
        FormItem::text('link', 'Ссылка на видео'),
        FormItem::text('seokey', 'SEO-ключ')->required()->unique(),
	]);
	return $form;
});