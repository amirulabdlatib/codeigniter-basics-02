<label for="title">Title</label>
<input type="text" id="title" name="title" value="<?= old("title", $article['title']); ?>">

<label for="content">Content</label>
<textarea type="text" id="content" name="content"><?= old('content', $article['content']); ?></textarea>

<button type="submit">Save</button>