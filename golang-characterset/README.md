# golang-characterset

## 내용
1. Database에 저장된 계좌주명이 암호화되어 저장되어있다.
1. 복호화해서 출력은 성공
1. 복호화된 보고서를 웹으로 제공할시 MacOS에서는 정상적으로 보이나 Window에서는 특수문자로 보이는 현상발견 (UTF-8로는 변환 확인)
1. 해결하기 위한 방법 고민

## 해결방안
1. 먼저 해당 문자열을 하나하나 꺼내서 확인
1. 한글자 한글자 16진수로 변환
1. 16진수로 유니코드 확인 사이트에서 한글자씩 확인
1. 문자로 사용되지 않는 엉뚱한 문자를 발견 (ex: U+0007, U+000F)
1. 문자로 사용되지않는 엉뚱한 문자는 제외시키는 로직 검색중 아래에 언어별 해결방법을 찾아 적용
1. 해결

## REFERENCE
- 16진수로 유니코드 확인 사이트 [https://www.fileformat.info/info/unicode/char/search.htm](https://www.fileformat.info/info/unicode/char/search.htm)
- 문자가 아닌 포함된 유니코드 목록 [https://en.wikipedia.org/wiki/List_of_Unicode_characters](https://en.wikipedia.org/wiki/List_of_Unicode_characters)
- 언어별 해결방법 [https://rosettacode.org/wiki/Strip_control_codes_and_extended_characters_from_a_string#C.2B.2B](https://rosettacode.org/wiki/Strip_control_codes_and_extended_characters_from_a_string#C.2B.2B)
