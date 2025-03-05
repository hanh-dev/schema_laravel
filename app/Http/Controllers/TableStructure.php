<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class TableStructure extends Controller
{
    public function table() {
        // Products
        if(!Schema::hasTable('products')) {
            Schema::create('products', function ($table) {
                $table->id();
                $table->string('name', 100)->nullable();
                $table->unsignedBigInteger('id_type')->nullable();
                $table->text('description')->nullable();
                $table->float('unit_price')->nullable();
                $table->float('promotion_price')->nullable();
                $table->string('image', 255)->nullable();
                $table->string('unit', 255)->nullable();
                $table->tinyInteger('new')->default(0);
                $table->timestamps();
            });
        }

        //Addresses
        if(!Schema::hasTable('addresses')) {
            Schema::create('addresses', function ($table) {
                $table->id();
                $table->string('street', 255)->nullable();
                $table->string('country', 255)->collation('utf8_unicode_ci');
                $table->integer('icon_id')->nullable();
                $table->integer('monster_id');
                $table->timestamps();
            });
        }

        //Articles
        if(!Schema::hasTable('articles')) {
            Schema::create('articles', function ($table) {
                $table->id();
                $table->unsignedBigInteger('category_id');
                $table->string('title', 255);
                $table->string('slug', 255)->default('');
                $table->text('content');
                $table->string('image', 255)->nullable();
                $table->enum('status', ['PUBLISHED', 'DRAFT'])->default('PUBLISHED');
                $table->date('date');
                $table->boolean('featured')->default(false);
                $table->timestamps();
                $table->softDeletes();
    
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            });
        }

        // Artical_tag
        if(!Schema::hasTable('article_tag')) {
            Schema::create('article_tag', function ($table) {
                $table->id();
                $table->unsignedBigInteger('article_id');
                $table->unsignedBigInteger('tag_id');
                $table->timestamps();
                $table->softDeletes();
            });
        }

        // A_S
        if(!Schema::hasTable('a_s')) {
            Schema::create('a_s', function ($table) {
                $table->id();
                $table->unsignedBigInteger('b_s_id');
            });
        }

        // Bills
        if(!Schema::hasTable('bills')) {
            Schema::create('bills', function ($table) {
                $table->id();
                $table->unsignedBigInteger('id_customer')->nullable();
                $table->date('date_order')->nullable();
                $table->float('total')->nullable()->comment('tổng tiền');
                $table->string('payment', 200)->nullable()->comment('hình thức thanh toán');
                $table->string('note', 500)->nullable();
                $table->timestamps();    
            });
        }

        // Bill Detail
        if(!Schema::hasTable('bill_detail')) {
            Schema::create('bill_detail', function ($table) {
                $table->id();
                $table->unsignedBigInteger('id_bill');
                $table->unsignedBigInteger('id_product');
                $table->integer('quantity')->comment('số lượng');
                $table->double('unit_price');
                $table->timestamps(); 
            });
        }

        // B_S
        if(!Schema::hasTable('b_s')) {
            Schema::create('b_s', function ($table) {
                $table->id();
                $table->string('data', 255);
                $table->timestamps();
            });
        }

        // Categories
        if (!Schema::hasTable('categories')) {
            Schema::create('categories', function ($table) {
                $table->id();
                $table->integer('parent_id')->default(0);
                $table->unsignedInteger('lft')->nullable();
                $table->unsignedInteger('rgt')->nullable();
                $table->unsignedInteger('depth')->nullable();
                $table->string('name', 255);
                $table->string('slug', 255);
                $table->timestamps();
                $table->softDeletes();
            });
        }

        // Comments
        if (!Schema::hasTable('comments')) {
            Schema::create('comments', function ($table) {
                $table->id();
                $table->string('username', 255);
                $table->text('comment');
                $table->unsignedBigInteger('id_product');
                $table->timestamps();
            });
        }

        // Customer
        if (!Schema::hasTable('customer')) {
            Schema::create('customer', function ($table) {
                $table->id();
                $table->string('name', 100);
                $table->string('gender', 10);
                $table->string('email', 50);
                $table->string('address', 100);
                $table->string('phone_number', 20);
                $table->string('note', 200);
                $table->timestamps();
            });
        }

        // Failed Job
        if (!Schema::hasTable('failed_jobs')) {
            Schema::create('failed_jobs', function ($table) {
                $table->id();
                $table->text('connection');
                $table->text('queue');
                $table->longText('payload');
                $table->longText('exception');
                $table->timestamp('failed_at')->useCurrent();
            });
        }
        
        // Icon
        if (!Schema::hasTable('icons')) {
            Schema::create('icons', function ($table) {
                $table->id();
                $table->string('name', 255);
                $table->string('icon', 255);
                $table->timestamps();
            });
        }

        // Menu Item
        if (!Schema::hasTable('menu_items')) {
            Schema::create('menu_items', function ($table) {
                $table->id();
                $table->string('name', 100);
                $table->string('type', 20)->nullable();
                $table->string('link', 255)->nullable();
                $table->unsignedBigInteger('page_id')->nullable();
                $table->unsignedBigInteger('parent_id')->nullable();
                $table->unsignedBigInteger('lft')->nullable();
                $table->unsignedBigInteger('rgt')->nullable();
                $table->unsignedBigInteger('depth')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }

        // Migration
        if (!Schema::hasTable('migrations')) {
            Schema::create('migrations', function ($table) {
                $table->id();
                $table->string('migration', 191);
                $table->integer('batch');
            });
        }
        
        // Model Has Permission
        if (!Schema::hasTable('model_has_permissions')) {
            Schema::create('model_has_permissions', function ($table) {
                $table->unsignedBigInteger('permission_id');
                $table->string('model_type', 255);
                $table->unsignedBigInteger('model_id');
            });
        }
        
        // Model Has Role
        if (!Schema::hasTable('model_has_roles')) {
            Schema::create('model_has_roles', function ($table) {
                $table->unsignedBigInteger('role_id');
                $table->string('model_type', 255);
                $table->unsignedBigInteger('model_id');
            });
        }
        
        // Monster
        if (!Schema::hasTable('monsters')) {
            Schema::create('monsters', function ($table) {
                $table->id();
                $table->string('address', 255)->nullable();
                $table->string('browse', 255)->nullable();
                $table->boolean('checkbox')->nullable();
                $table->text('wysiwyg')->nullable();
                $table->string('color', 255)->nullable();
                $table->string('color_picker', 255)->nullable();
                $table->date('date')->nullable();
                $table->date('date_picker')->nullable();
                $table->date('start_date')->nullable();
                $table->date('end_date')->nullable();
                $table->dateTime('datetime')->nullable();
                $table->dateTime('datetime_picker')->nullable();
                $table->string('email', 255)->nullable();
                $table->integer('hidden')->nullable();
                $table->string('icon_picker', 255)->nullable();
                $table->string('image', 255)->nullable();
                $table->string('month', 255)->nullable();
                $table->integer('number')->nullable();
                $table->double('float', 8, 2)->nullable();
                $table->string('password', 255)->nullable();
                $table->string('radio', 255)->nullable();
                $table->string('range', 255)->nullable();
                $table->integer('select')->nullable();
                $table->string('select_from_array', 255)->nullable();
                $table->integer('select2')->nullable();
                $table->string('select2_from_ajax', 255)->nullable();
                $table->string('select2_from_array', 255)->nullable();
                $table->text('simplemde')->nullable();
                $table->text('summernote')->nullable();
                $table->text('table')->nullable();
                $table->text('textarea')->nullable();
                $table->string('text', 255);
                $table->text('tinymce')->nullable();
                $table->string('upload', 255)->nullable();
                $table->string('upload_multiple', 255)->nullable();
                $table->string('url', 255)->nullable();
                $table->text('video')->nullable();
                $table->string('week', 255)->nullable();
                $table->text('extras')->nullable();
                $table->mediumBlob('base64_image')->nullable();
                $table->timestamps();
            });
        }
        
        // Monster Artical
        if (!Schema::hasTable('monster_article')) {
            Schema::create('monster_article', function ($table) {
                $table->id();
                $table->foreignId('monster_id')->constrained('monsters')->onDelete('cascade');
                $table->foreignId('article_id')->constrained('articles')->onDelete('cascade');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        
        // Monster Category
        if (!Schema::hasTable('monster_category')) {
            Schema::create('monster_category', function ($table) {
                $table->id();
                $table->foreignId('monster_id')->constrained('monsters')->onDelete('cascade');
                $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        
        // Monster Tag
        if (!Schema::hasTable('monster_tag')) {
            Schema::create('monster_tag', function ($table) {
                $table->id();
                $table->foreignId('monster_id')->constrained('monsters')->onDelete('cascade');
                $table->foreignId('tag_id')->constrained('tags')->onDelete('cascade');
                $table->timestamps();
                $table->softDeletes();
            });
        }
        
        // News
        if (!Schema::hasTable('news')) {
            Schema::create('news', function ($table) {
                $table->id();
                $table->string('title', 200)->comment('tiêu đề');
                $table->text('content')->comment('nội dung');
                $table->string('image', 100)->comment('hình');
                $table->timestamps();
            });
        }

        // Pages
        if (!Schema::hasTable('pages')) {
            Schema::create('pages', function ($table) {
                $table->id();
                $table->string('template', 255);
                $table->string('name', 255);
                $table->string('title', 255);
                $table->string('slug', 255)->unique();
                $table->text('content')->nullable();
                $table->text('extras')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }

        // Password Reset
        if (!Schema::hasTable('password_resets')) {
            Schema::create('password_reset', function ($table) {
                $table->string('email', 255)->index();
                $table->string('token', 255);
                $table->timestamp('created_at')->useCurrent();
            });
        }

        // Permissions
        if (!Schema::hasTable('permissions')) {
            Schema::create('permissions', function ($table) {
                $table->id();
                $table->string('name', 255);
                $table->string('guard_name', 255);
                $table->timestamps();
            });
        }

        // Postallboxes
        if (!Schema::hasTable('postallboxes')) {
            Schema::create('postallboxes', function ($table) {
                $table->id();
                $table->string('postal_name', 255)->nullable();
                $table->unsignedBigInteger('monster_id');
            });
        }

        // Revisions
        if (!Schema::hasTable('revisions')) {
            Schema::create('revisions', function ($table) {
                $table->id();
                $table->string('revisionable_type', 255);
                $table->unsignedBigInteger('revisionable_id');
                $table->unsignedBigInteger('user_id')->nullable();
                $table->string('key', 255);
                $table->text('old_value')->nullable();
                $table->text('new_value')->nullable();
                $table->timestamps();
            });
        }

        // Roles
        if (!Schema::hasTable('roles')) {
            Schema::create('roles', function ($table) {
                $table->id();
                $table->string('name', 255);
                $table->string('guard_name', 255);
                $table->timestamps();
            });
        }
        
        // Role has permission
        if (!Schema::hasTable('role_has_permissions')) {
            Schema::create('role_has_permissions', function ($table) {
                $table->unsignedBigInteger('permission_id');
                $table->unsignedBigInteger('role_id');
            });
        }

        // Settings
        if (!Schema::hasTable('settings')) {
            Schema::create('settings', function ($table) {
                $table->id();
                $table->string('key')->unique();
                $table->string('name');
                $table->string('description')->nullable();
                $table->string('value')->nullable();
                $table->text('field');
                $table->boolean('active')->default(1);
                $table->timestamps();
            });
        }

        // Slide
        if (!Schema::hasTable('slide')) {
            Schema::create('slide', function ($table) {
                $table->id();
                $table->string('link', 100);
                $table->string('image', 100);
                $table->timestamps();
            });
        }

        // Tags
        if (!Schema::hasTable('tags')) {
            Schema::create('tags', function ($table) {
                $table->id();
                $table->string('name', 255);
                $table->string('slug', 255)->unique();
                $table->timestamps();
                $table->softDeletes();
            });
        }

        // Type Products
        if (!Schema::hasTable('type_products')) {
            Schema::create('type_products', function ($table) {
                $table->id();
                $table->string('name', 100);
                $table->text('description');
                $table->string('image', 255);
                $table->timestamps();
            });
        }

        // Users
        if (!Schema::hasTable('slide')) {
            Schema::create('slide', function ($table) {
                $table->id();
                $table->string('name', 100);
                $table->text('description');
                $table->string('image', 255);
                $table->timestamps();
            });
        }

        // // Wishlists
        // if (!Schema::hasTable('slide')) {
        //     Schema::create('slide', function ($table) {
        //         $table->id();
        //         $table->foreignId('id_user')->constrained('users')->onDelete('cascade'); 
        //         $table->foreignId('id_product')->constrained('products')->onDelete('cascade'); 
        //         $table->integer('quantity')->default(1);
        //         $table->timestamps(); // Tạo created_at và updated_at tự động
        //     });
        // }
    }
}
