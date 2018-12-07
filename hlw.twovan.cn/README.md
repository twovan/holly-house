### 券号核销
- 安装核心库文件，项目根目录执行
    ```
    composer install
    ```
- 更改`storage`目录权限
    ```
    sudo chmod -R 777 storage
    ```
- 读取上传文件使用命令 `storage:link` 来创建符号链接：
    ```
    php artisan storage:link
    ```
