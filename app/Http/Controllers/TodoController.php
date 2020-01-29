<?php
// データベースとの処理
// 名前空間の定義
namespace App\Http\Controllers;

//インポート
use Illuminate\Http\Request; //クラスを使えるようにする
use App\Todo;
use Auth;

class TodoController extends Controller
{
    private $todo;

    public function __construct(Todo $instanceClass) //construct インスタンス化するときに自動で実行される マジック
    {
        $this->middleware('auth');  // 追記
        $this->todo = $instanceClass;  //Controllerが継承された TodoContorollerに$instance代入
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $todos = $this->todo->getByUserId(Auth::id());
        // $todos = $this->todo->all(); //colectionインスタンス　
        // dd($this->todo->all());
        return view('todo.index', compact('todos')); //compact viewに変数連想配列を渡している .フォルダーの階層表している 質問conpact
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('todo.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)  // Requestクラスのインスタンスしたのが　$requestを代入
    {
        //
        $input = $request->all(); //入力された全ての値  $input 配列　title token
        $input['user_id'] = Auth::id(); //認証されているユーザーのid取得
        $this->todo->fill($input)->save(); //インスタンス化todo->データベースのカラム更新->save true
        // dd($this->todo->fill($input)->save());
        return redirect()->to('todo'); // redirectが引数なしで呼び出されると　redirextcterインスタンスが返されメソッドを使える. URI toインスタンス
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = $this->todo->find($id);  // 追記 返り値model オブジェクト
        return view('todo.edit', compact('todo')); // 追記 viewインスタンス
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all(); //method token title 配列 全入力を配列で受け取る
        $this->todo->find($id)->fill($input)->save(); //find()登録してる値を取得 Modelオブジェクト返す->更新  返り値todo
        // dd($this->todo->find($id)->fill($input));
        return redirect()->to('todo'); //route
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->todo->find($id)->delete();
        return redirect()->to('todo');
    }
}
