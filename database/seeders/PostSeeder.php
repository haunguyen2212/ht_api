<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now()->format(config('constants.DATE_TIME_FORMAT'));
        DB::table('posts')->insert([
            [
                'title' => 'Thuật toán sắp xếp nhanh - Quick sort',
                'excerpt' => 'Quick sort là một thuật toán sắp xếp hiệu quả cao. Nó hoạt động bằng cách phân vùng đệ quy dữ liệu thành hai mảng con: các phần tử nhỏ hơn phần tử trục đã chọn và các phần tử lớn hơn trục. Cách tiếp cận chia để trị này sắp xếp dữ liệu một cách hiệu quả bằng cách đặt các phần tử nhỏ hơn trước các phần tử lớn hơn.',
                'content' => 'content',
                'category_id' => 1,
                'author' => 1,
                'publish_status' => 1,
                'publish_date_from' => '2023-01-01 00:00:00',
                'publish_date_to' => null,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Thuật toán sắp xếp trộn - Merge sort',
                'excerpt' => 'Merge sort là một thuật toán sắp xếp linh hoạt sử dụng chiến lược chia để trị. Nó chia dữ liệu thành các mảng con nhỏ hơn, sắp xếp chúng một cách độc lập và sau đó hợp nhất các mảng con đã sắp xếp lại thành một mảng được sắp xếp duy nhất.',
                'content' => 'content',
                'category_id' => 1,
                'author' => 1,
                'publish_status' => 1,
                'publish_date_from' => '2023-01-01 00:00:00',
                'publish_date_to' => '2024-07-01 00:00:00',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Thuật toán sắp xếp vun đống - Heap sort',
                'excerpt' => 'Heap sort là một thuật toán sắp xếp mạnh mẽ sử dụng cấu trúc dữ liệu được gọi là heap để đạt được hiệu quả sắp xếp hiệu quả. Nó có thể được coi là một loại lựa chọn tận dụng thuộc tính sắp xếp vốn có của heap.',
                'content' => 'content',
                'category_id' => 1,
                'author' => 1,
                'publish_status' => 1,
                'publish_date_from' => '2023-01-01 00:00:00',
                'publish_date_to' => null,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
