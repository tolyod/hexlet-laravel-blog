<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests\StoreArticle;

class ArticleController extends Controller
{
    //
    public function index()
    {
        $articles = Article::paginate(2);

        // Статьи передаются в шаблон
        // compact('articles') => [ 'articles' => $articles ]
        return view('article.index', compact('articles'));
    }
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }
    // Вывод формы
    public function create()
    {
        // Передаем в шаблон вновь созданный объект. Он нужен для вывода формы через Form::model
        $article = new Article();
        return view('article.create', compact('article'));
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('article.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $this->validate($request, [
            // У обновления немного измененная валидация. В проверку уникальности добавляется название поля и id текущего объекта
            // Если этого не сделать, Laravel будет ругаться на то что имя уже существует
            'name' => 'required|unique:articles,name,' . $article->id,
            'body' => 'required|min:100',
        ]);

        $article->fill($request->all());
        $article->save();
        return redirect()
            ->route('articles.index');
    }

    public function store(StoreArticle $request)
    {
        // Проверка введенных данных
        // Если будут ошибки, то возникнет исключение
        /* $this->validate($request, [ */
        /*     'name' => 'required|unique:articles', */
        /*     'body' => 'required|min:1000', */
        /* ]); */
        $validated = $request->validated();

        $article = new Article();
        // Заполнение статьи данными из формы
        $article->fill($validated); //$request->all());
        // При ошибках сохранения возникнет исключение
        $article->save();

        // Редирект на указанный маршрут с добавлением флеш сообщения
        return redirect()
            ->route('articles.index');
    }
}
