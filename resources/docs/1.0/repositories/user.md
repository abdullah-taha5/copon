# UserRepository

---

- [Basic](#basic)

<a name="basic"></a>
## Basic

```php
use ResponseHelper;
```
use this trait to handle responses in the application, you can understand this helper function more from this <a href="/{{route}}/{{version}}/response-helper">Link</a>

---

### Construct 

```php
public User $model;
public function __construct() {
    $this->model = new User();
}
```
Construct Targeted Model to use in the class and make a maintenance and modify more Easy

### Filter 

```php
    public function filter($rows, $search) {
        return $rows->where('name', 'LIKE', "%$search%");
    }
```
Filter Function Target is a search in Target Model Database in filter results by name

---
### Paginated Rows 

```php
    // $count   => Showed Records per page
    // $search  => User Search value 
public function getPaginatedRows(int $count = 30, string $search = "")
{
    try {
        $rows = $this->model; // initialize Model
        $rows = $this->filter($rows, $search); // Fire Filler Faction 
        $rows = $rows->paginate($count); // Paginate Rows
        // Handle Response if success
        return $this->responseHelper(200, true, __('app.data_retrieved'),$rows,  self::class);
    } catch (\Throwable $th) {       
        // Handle Response if failure     
        return $this->responseHelper(500, false, $th->getMessage() . ' in line ' . $th->getLine(),[],  self::class);
    }
}
```

---
### Row By Id
Get Specifically Row By ID
```php
public function getRowById(int $id)
{
    try {
        $rows = $this->model->find($id); // Search in database by id
        if($rows != null) { // Check If Found Rpw Has This id
            return $this->responseHelper(200, true, __('app.data_retrieved'),$rows,  self::class);
        } else { // If not found
            return $this->responseHelper(404, false, __('app.not_fount'),[],  self::class);
        }
    } catch (\Throwable $th) { // if code has internal server error 
        return $this->responseHelper(500, false, $th->getMessage() . ' in line ' . $th->getLine(), [], self::class);
    }
}
```