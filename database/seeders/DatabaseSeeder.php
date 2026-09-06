<?php

namespace Database\Seeders;

use App\Models\Experience;
use App\Models\Profile;
use App\Models\Service;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Profile::create([
            'name' => 'LÊ BÁ HÙNG ANH',
            'job_title' => 'WEB DEVELOPER & BUSINESS ANALYST',
            'avatar_path' => 'images/abc.png',
            'dob' => '2007-09-23',
            'phone' => '+84 942 231 599',
            'address' => 'Hanoi, Vietnam.',
            'email' => 'hagameing31@gmai.com',
            'website' => 'www.hunganh.dev',
            'about_text' => 'Mình là một sinh viên chuyên ngành Hệ thống Thông tin với đam mê sâu sắc về phát triển phần mềm và phân tích nghiệp vụ. Mình luôn nỗ lực học hỏi để tạo ra những sản phẩm web có hiệu suất cao, giao diện tối ưu và mang lại giá trị thực tế cho doanh nghiệp.',
        ]);

        Service::insert([
            [
                'title' => 'Web Development',
                'description' => 'Xây dựng các ứng dụng web động bằng PHP (Laravel), Vue.js và các công nghệ frontend hiện đại.',
                'icon' => 'fa-solid fa-laptop-code',
            ],
            [
                'title' => 'Business Analysis',
                'description' => 'Phân tích yêu cầu, vẽ sơ đồ UML, thiết kế cơ sở dữ liệu và chuyển hóa nghiệp vụ thành phần mềm.',
                'icon' => 'fa-solid fa-chart-line',
            ],
            [
                'title' => 'Responsive Design',
                'description' => 'Đảm bảo giao diện website hiển thị hoàn hảo trên mọi thiết bị từ điện thoại đến màn hình desktop lớn.',
                'icon' => 'fa-solid fa-mobile-screen',
            ],
            [
                'title' => 'Database Management',
                'description' => 'Thiết kế, tối ưu hóa và bảo trì hệ cơ sở dữ liệu quan hệ như MySQL và PostgreSQL.',
                'icon' => 'fa-solid fa-database',
            ],
        ]);

        Experience::insert([
            [
                'year' => '2026',
                'title' => 'Freelance Web Developer',
                'description' => 'Thực hiện các dự án website nhỏ và vừa cho khách hàng. Chịu trách nhiệm toàn bộ vòng đời phát triển từ lấy yêu cầu, thiết kế DB, code và triển khai.',
            ],
            [
                'year' => '2026',
                'title' => 'Sinh Viên Ngành Hệ Thống Thông Tin',
                'description' => 'Bắt đầu nghiên cứu chuyên sâu về phân tích thiết kế hệ thống và phát triển phần mềm ứng dụng web.',
            ],
        ]);
    }
}
