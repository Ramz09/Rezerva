<?php 

require '../vendor/autoload.php';

use App\models\Admin;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Schema\Blueprint;
use App\models\Table;

function start($table){
    echo "creating_".$table."_table".PHP_EOL;
}

function endMigrations($table){
    echo $table."_table_successfully_created_at_". date('Y-m-d H:i:s').PHP_EOL;
}
 $tables= [
     'admins',
     'customers',
     'categories',
     'menus',
     'invoices',
     'tables',
     'orders',
     'reviews'
    ];

foreach ($tables as $table){
    if (Manager::schema()->hasTable($table)) {
         endMigrations($table);
    }else {

        // admins table --this table provided for admin
        Manager::schema()->dropIfExists('admins');
        Manager::schema()->create('admins', function (Blueprint $table) {
            start('admins');
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            endMigrations('admins');
        });

        //customers table
        Manager::schema()->dropIfExists('customers');
        Manager::schema()->create('customers', function (Blueprint $table) {
            start('customers');
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->rememberToken();
            $table->timestamps();
            endMigrations('customers');
        });
        
        //categories table
        Manager::schema()->dropIfExists('categories');
        Manager::schema()->create('categories', function (Blueprint $table) {
            start('categories');
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('slug')->unique();
            $table->timestamps();
            endMigrations('categories');
        });

        //menus table
        Manager::schema()->dropIfExists('menus');
        Manager::schema()->create('menus', function (Blueprint $table) {
            start('menus');
            $table->id();
            $table->string('image');
            $table->string('title');
            $table->string('slug');
            $table->unsignedBigInteger('category_id');
            $table->text('description');
            $table->bigInteger('price');
            $table->bigInteger('final_price');
            $table->enum('stock',array('tersedia','habis'))->default('tersedia');
            $table->integer('discount');
            $table->integer('sold');
            $table->float('rating');
            $table->timestamps();

            //relationship category
            $table->foreign('category_id')->references('id')->on('categories');
            endMigrations('menus');
        });

        //tables table
        Manager::schema()->dropIfExists('tables');
        Manager::schema()->create('tables', function (Blueprint $table) {
            start('tables');
            $table->id();
            $table->string('table');
            $table->timestamps();
            endMigrations('tables');
        });

        //carts table
        Manager::schema()->dropIfExists('carts');
        Manager::schema()->create('carts', function (Blueprint $table) {
            start('carts');
            $table->id();
            $table->unsignedBigInteger('menu_id');
            $table->integer('jumlah');
            $table->unsignedBigInteger('session_id');
            $table->string('keterangan');
            $table->integer('price');
            $table->timestamps();

            $table->foreign('menu_id')->references('id')->on('menus');

            endMigrations('carts');
        });

        //invoices table
        Manager::schema()->dropIfExists('invoices');
        Manager::schema()->create('invoices', function (Blueprint $table) {
            start('invoices');
            $table->id();
            $table->string('invoice');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('table_id');
            $table->enum('status_pembayaran',array('pending','success','expired','failed'));
            $table->enum('status_pesanan',array('dikonfirmasi','diantar', 'diterima','ditolak'));
            $table->bigInteger('grand_total');
            $table->string('snap_token')->nullable();
            $table->timestamps();

            //relationship customer
            $table->foreign('customer_id')->references('id')->on('customers');
            
            //relationship table
            $table->foreign('table_id')->references('id')->on('tables');
            endMigrations('invoices');
        });
        
        //orders table
        Manager::schema()->dropIfExists('orders');
        Manager::schema()->create('orders', function (Blueprint $table) {
            start('orders');
            $table->id();
            $table->unsignedBigInteger('invoice_id');
            $table->unsignedBigInteger('table_id');
            $table->unsignedBigInteger('menu_id');
            $table->string('description');
            $table->integer('qty');
            $table->bigInteger('price');
            $table->timestamps();

            //relationship menu
            $table->foreign('menu_id')->references('id')->on('menus');
            $table->foreign('table_id')->references('id')->on('tables');
            $table->foreign('invoice_id')->references('id')->on('invoices');
            endMigrations('orders');
        });

        //reviews table 
        Manager::schema()->dropIfExists('reviews');
        Manager::schema()->create('reviews', function (Blueprint $table) {
            start('reviews');
            $table->unsignedBigInteger('menu_id');
            // $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('customer_id');
            $table->integer('rate');
            $table->text('review');
            $table->timestamps();

            //relationship product
            $table->foreign('menu_id')->references('id')->on('menus');

            //relationship order
            // $table->foreign('order_id')->references('id')->on('orders'); 
                    
            //relationship customer
            $table->foreign('customer_id')->references('id')->on('customers');
            endMigrations('reviews');
        });
    }
}

for($i = 0; $i < 100; $i++){
    Table::create([
        'table' => $i + 1,
    ]);
}

Admin::create([
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => 'admin',
    ]);
    
Admin::create([
        'name' => 'eko',
        'email' => 'eko@gmail.com',
        'password' => 'eko',
    ]);

Admin::create([
        'name' => 'budi',
        'email' => 'budi@gmail.com',
        'password' => 'budi',
    ]);

Admin::create([
        'name' => 'joko',
        'email' => 'joko@gmail.com',
        'password' => 'joko',
    ]);

Admin::create([
        'name' => 'edi',
        'email' => 'edi@gmail.com',
        'password' => 'edi',
    ]);