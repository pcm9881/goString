# git credential 

## 내용
평소에 `git` 로그인이 귀찮아서 `credential` 기능을 등록 사용 했다가 프로젝트가 보안상 계정이 변경 되면서 `repository` 별로 서로 다르게 사용하려고 함. 
해서 기존에 등록되어 있는 내용 삭제 하는 내용

## 해결방안
``` shell
$ git config --global --unset credential.helper
$ git config --system --unset credential.helper
```

### REFERENCE
- [https://stackoverflow.com/questions/15381198/remove-credentials-from-git](https://stackoverflow.com/questions/15381198/remove-credentials-from-git)