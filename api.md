GET /api/countries/list
GET /api/cities/list
GET /api/currencies/list

GET /api/blog/posts?limit=5
GET /api/blog/posts/{slug}
GET /api/categories/list?limit=5
GET /api/categories/{slug}/subcategories

GET `/api/items/list?type=`
filters:
- section = [latest|promoted|featured]
- type = [sell|rent]
- condition = [new|used]
- stock = [in_stock,out_of_stock]
- sort = [recent|old]
- min_price = 100
- max_price = 200
- city = 1
- category = 1

GET /api/items/{slug} ====> show item
POST /api/items/submit

POST /api/settings/change-password
- old_password, new_password, confirm_new_password

GET /api/items/search?query=hello
GET /api/categories/search?query=hello --- search about main category only
GET /api/users/search?query=hello

GET /api/users/profile ==> it will return user profile info
- name [required], phone [required], about [optinal]

GET /api/users/notifications
