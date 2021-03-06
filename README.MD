# LaraClean

Clean Architecture sample with Laravel

Laravel で実践クリーンアーキテクチャの形に組んでみました。  
詳しい解説は下記解説をご覧ください。  
Laravelで実践クリーンアーキテクチャ: https://qiita.com/nrslib/items/aa49d10dd2bcb3110f22  
  
また次の記事もあわせていただくと参考になるでしょう。  
実践クリーンアーキテクチャ: https://nrslib.com/clean-architecture/  
実装クリーンアーキテクチャ: https://qiita.com/nrslib/items/a5f902c4defc83bd46b8  

# どれがどれにあたるか

どの実装が図におけるどれにあたるかを書いておきます。

## 同心円

![いつもの](https://github.com/nrslib/LaraClean/blob/master/image/CleanArchitecture.jpg)

いつもの図です。

### Controllers
- App\Http\Controllers\UserController

### UseCases
- packages\UseCase\User\Create\UserCreateUseCaseInterface
- packages\UseCase\User\GetList\UserGetUseCaseInterface
- packages\Domain\Application\User\UserCreateInteractor
- packages\Domain\Application\User\UserGetListInteractor
- packages\MockInteractor\User\MockUserCreateInteractor
- packages\MockInteractor\User\MockUserGetInteractor

### Entities
- packages\Domain\Domain 以下

### Presenters
- App\Http\Presenters\User\UserCreatePresenter
- App\Http\Presenters\User\UserGetListPresenter
- packages\UseCase\User\Create\UserCreatePresenterInterface
- packages\UseCase\User\GetList\UserGetListPresenterInterface

### Gateways
- packages\Domain\Domain\User\UserRepositoryInterface
- packages\Infrastructure\User\UserRepository
- packages\InMemoryInfrastructure\User\InMemoryUserRepository

Interface と Adapter です。

## 同心円の図の右下

![右下の図](https://github.com/nrslib/LaraClean/blob/master/image/LowerRight.jpg)

案外わかりやすい右下の図です。

### Controller
- App\Http\Controllers\UserController

通常の MVC フレームワークのコントローラです。  
ヘキサゴナルアーキテクチャのアダプタにあたります。

### UseCaseInputPort
- packages\UseCase\User\Create\UserCreateUseCaseInterface
- packages\UseCase\User\GetList\UserGetUseCaseInterface

### UseCaseInteractor
- packages\Domain\Application\User\UserCreateInteractor
- packages\Domain\Application\User\UserGetListInteractor
- packages\MockInteractor\User\MockUserCreateInteractor
- packages\MockInteractor\User\MockUserGetInteractor

### UseCaseOutputPort
- packages\UseCase\User\Create\UserCreatePresenterInterface
- packages\UseCase\User\GetList\UserGetListPresenterInterface

### Presenter
- App\Http\Presenters\User\UserCreatePresenter
- App\Http\Presenters\User\UserGetListPresenter

## クラス図

![クラス図みたいなの](https://github.com/nrslib/LaraClean/blob/master/image/ClassDiagram.jpg)

左上から書いていきます。

### Controller
- App\Http\Controllers\UserController

### InputData
- packages\UseCase\User\Create\UserCreateRequest
- packages\UseCase\User\GetList\UserGetRequest

### InputBoundary
- packages\UseCase\User\Create\UserCreateUseCaseInterface
- packages\UseCase\User\GetList\UserGetUseCaseInterface

### UseCaseInteractor
- packages\Domain\Application\User\UserCreateInteractor
- packages\Domain\Application\User\UserGetListInteractor
- packages\MockInteractor\User\MockUserCreateInteractor
- packages\MockInteractor\User\MockUserGetInteractor

### Entities
- packages\Domain\Domain 以下

### DataAccessInterface
- packages\Domain\Domain\User\UserRepositoryInterface

### OutputData
- packages\UseCase\User\Create\UserCreateResponse
- packages\UseCase\User\GetList\UserGetResponse

### OutputBoundary
- packages\UseCase\User\Create\UserCreatePresenterInterface
- packages\UseCase\User\GetList\UserGetListPresenterInterface

### Presenter
- App\Http\Presenters\User\UserCreatePresenter
- App\Http\Presenters\User\UserGetListPresenter

### ViewModel
- App\Http\Models 以下
