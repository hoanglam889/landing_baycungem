<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Setting;
use App\Models\HeroSection;
use App\Models\Service;
use App\Models\AboutUs;
use App\Models\VideoShowcase;
use App\Models\TikTokVideo;
use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create default Admin User for Filament & Breeze
        User::updateOrCreate(
            ['email' => 'admin@baycungem.vn'],
            [
                'name' => 'Admin Baycungem',
                'password' => Hash::make('password'),
            ]
        );

        // 2. Settings Seeder
        Setting::updateOrCreate(
            ['id' => 1],
            [
                'site_name' => 'Baycungem',
                'phone' => '+84 912 345 678',
                'email' => 'hello@baycungem.vn',
                'address' => '123 Đường Trần Hưng Đạo, Quận 1, TP. HCM',
                'facebook_url' => '#',
                'instagram_url' => '#',
                'youtube_url' => '#',
                'tiktok_url' => '#',
                'zalo_url' => 'https://zalo.me/0901577579',
                'copyright' => '© 2026 Baycungem. Bảo lưu mọi quyền.',
            ]
        );

        // 3. HeroSection Seeder
        HeroSection::updateOrCreate(
            ['id' => 1],
            [
                'badge_text' => 'Baycungem | Flycam chuyên nghiệp',
                'title' => 'Chạm tới những góc nhìn mới với video flycam chất lượng cao.',
                'description' => 'Dịch vụ quay phim, chụp ảnh flycam và VR Panorama cho bất kỳ dự án nào: sự kiện, địa ốc, resort, du lịch.',
                'background_image_url' => 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=1600&q=80',
                'primary_button_text' => 'Khám phá ngay',
                'primary_button_url' => '#service1',
                'secondary_button_text' => 'Liên hệ tư vấn',
                'secondary_button_url' => '#about',
            ]
        );

        // 4. Services Seeder
        Service::truncate();
        Service::create([
            'image_url' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=800&q=80',
            'badge' => 'Hot',
            'title' => 'VR Tour 360° Showroom & Resort',
            'description' => 'Giải pháp số hóa không gian thực tế 360 độ. Giúp khách hàng tham quan chi tiết nhà mẫu, showroom, resort từ xa ngay trên điện thoại/máy tính với trải nghiệm chân thực nhất.',
            'price' => 'Từ 4.900.000đ',
            'detail_url' => '#service1',
            'order' => 0,
        ]);
        Service::create([
            'image_url' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=800&q=80',
            'badge' => 'Hot',
            'title' => 'Video Flycam Sự Kiện & Dự Án',
            'description' => 'Sản xuất video chất lượng cao (4K/6K) từ góc nhìn trên cao. Ghi dấu ấn quy mô cho sự kiện doanh nghiệp, lễ hội lớn và cập nhật tiến độ công trình xây dựng trực quan.',
            'price' => 'Từ 3.500.000đ',
            'detail_url' => '#service2',
            'order' => 1,
        ]);
        Service::create([
            'image_url' => 'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&w=800&q=80',
            'badge' => 'Mới',
            'title' => 'Sa Bàn Ảo 360° Bất Động Sản',
            'description' => 'Công cụ bán hàng (Sales Kit) tối ưu tích hợp bản vẽ phân khu, vị trí tiện ích và view thực tế từng căn hộ từ trên cao. Hỗ trợ tối đa cho sales tư vấn và chốt cọc online dễ dàng.',
            'price' => 'Từ 9.900.000đ',
            'detail_url' => '#service1',
            'order' => 2,
        ]);

        // 5. AboutUs Seeder
        AboutUs::updateOrCreate(
            ['id' => 1],
            [
                'image_url' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1000&q=80',
                'badge' => 'Về chúng tôi',
                'title' => 'Baycungem - đối tác uy tín cho mọi dự án truyền thông trên không',
                'description' => 'Với đội ngũ chuyên gia quay flycam giàu kinh nghiệm, thiết bị hiện đại và quy trình sản xuất chuyên nghiệp, Baycungem mang đến hình ảnh chất lượng cao, an toàn và đúng tiến độ.',
                'features' => [
                    'Thiết bị drone 4K/6K mới nhất, camera chống rung gimbal chính xác.',
                    'Quá trình hậu kỳ màu sắc chuyên sâu, dựng phim nhanh chóng và chuyên nghiệp.',
                    'Bảo mật nội dung, hỗ trợ tư vấn toàn diện từ khâu ý tưởng đến truyền thông.'
                ],
            ]
        );

        // 6. VideoShowcase Seeder
        VideoShowcase::updateOrCreate(
            ['id' => 1],
            [
                'badge' => 'Khám phá',
                'title' => 'Khám phá Baycungem qua Video',
                'description' => 'Xem video trình diễn flycam và sản phẩm trải nghiệm thực tế để cảm nhận phong cách Baycungem.',
                'youtube_embed_url' => 'https://www.youtube.com/embed/9aiZ-FieyvY?si=nLiXKdkKAy0mAfMv',
            ]
        );

        // 7. TikTokVideo Seeder
        TikTokVideo::truncate();
        TikTokVideo::create([
            'tiktok_url' => 'https://www.tiktok.com/@.baycungem/video/7422285166367804679',
            'local_video_path' => 'videos/video1.mp4',
            'order' => 0,
        ]);
        TikTokVideo::create([
            'tiktok_url' => 'https://www.tiktok.com/@.baycungem/video/7585922969336139028',
            'local_video_path' => 'videos/video2.mp4',
            'order' => 1,
        ]);
        TikTokVideo::create([
            'tiktok_url' => 'https://www.tiktok.com/@.baycungem/video/7649760522543336705',
            'local_video_path' => 'videos/video3.mp4',
            'order' => 2,
        ]);

        // 8. News Seeder
        News::truncate();
        News::create([
            'title' => 'Baycungem mở rộng dịch vụ quay flycam tại Đà Nẵng',
            'category' => 'Tin tức & Sự kiện',
            'image_url' => 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?auto=format&fit=crop&w=800&q=80',
            'summary' => 'Baycungem chính thức khai trương chi nhánh mới tại Đà Nẵng, cung cấp dịch vụ bay chụp và số hóa VR Panorama toàn diện cho các dự án nghỉ dưỡng miền Trung.',
            'published_date' => '2026-06-03',
        ]);
        News::create([
            'title' => 'Giới thiệu gói VR Panorama cho bất động sản cao cấp',
            'category' => 'Tin tức & Sự kiện',
            'image_url' => 'https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=800&q=80',
            'summary' => 'Giải pháp hình ảnh mới giúp chủ đầu tư nâng tầm giá trị dự án căn hộ và resort, tăng tỷ lệ chốt sales từ xa qua website.',
            'published_date' => '2026-05-20',
        ]);
        News::create([
            'title' => 'Mẹo tận dụng flycam để quảng bá sự kiện mùa hè',
            'category' => 'Tin tức & Sự kiện',
            'image_url' => 'https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=800&q=80',
            'summary' => 'Những góc quay từ trên cao luôn gây ấn tượng mạnh. Hãy cùng Baycungem điểm qua các lưu ý quan trọng khi setup bay chụp sự kiện ngoài trời.',
            'published_date' => '2026-05-10',
        ]);
    }
}
