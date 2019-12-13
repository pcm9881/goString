# PHP curl 테스트 

## 내용
1. 로그인 진행시 진입 IP를 갖고 별도 API 서비스를 PHP로 호출한다.
1. IP 주소 추적 API는 `KISA 후이즈` 사용
1. 로그인시 해당 IP 추적 API에서 Timeout 발생 
1. 결론적으로 로그인이 진행안되는 상황 발생
1. 해서 curl Timeout 발생시 예외처리 하기위한 예제


## 테스트
1. 웹 호출 형태로 테스트하기 위해 [Slim](https://github.com/slimphp/Slim) 사용

### Requirements
- PHP version >= 7
- composer


### KISA 후이즈 사용예제
- Request

``` 
URL: http://whois.kisa.or.kr/openapi/whois.jsp?query={IP}&key={KEY}&answer=json
Method: GET
```

- Response

``` json
{
  "whois": {
    "query": "61.82.69.110",
    "queryType": "IPv4",
    "registry": "KRNIC",
    "countryCode": "KR",
    "korean": {
      "ISP": {
          "netinfo": {
            "range": "61.82.0.0 - 61.85.255.255",
            "prefix": "/14",
            "servName": "KORNET",
            "orgName": "주식회사 케이티",
            "orgID": "ORG1600",
            "addr": "경기도 성남시 분당구 불정로 90",
            "zipCode": "13606",
            "regDate": "20010713"
          },
        "techContact": {
          "name": "IP주소 담당자",
          "phone": "+82-2-500-6630",
          "email": "kornet_ip@kt.com"
        }
      }
    },
    "english": {
      "ISP": {
        "netinfo": {
          "range": "61.82.0.0 - 61.85.255.255",
          "prefix": "/14",
          "servName": "KORNET",
          "orgName": "Korea Telecom",
          "orgID": "ORG1600",
          "addr": "Gyeonggi-do Bundang-gu, Seongnam-si Buljeong-ro 90",
          "zipCode": "13606",
          "regDate": "20010713"
        },
        "techContact": {
          "name": "IP Manager",
          "phone": "+82-2-500-6630",
          "email": "kornet_ip@kt.com"
        }
      }
    }
  }
}
```

### 초기환경 설치

``` sh
$ composer install
$ php -S localhost:8000 -t public
```

- 새로운 터미널 창 열어서 아래 호출

### 정상

``` sh
$ php ./php/success.php
```

### 타임아웃

``` sh
php ./php/time_out.php
```