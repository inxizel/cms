<?php

use Illuminate\Database\Seeder;
use Zent\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Schema::disableForeignKeyConstraints();
        \DB::table('permissions')->truncate();
        \Schema::enableForeignKeyConstraints();

        //quan ly tai khoan
        Permission::create([
            'name'=>'users-view',
            'display_name'=>'Xem danh sách tài khoản',
        ]);
        Permission::create([
            'name'=>'users-add',
            'display_name'=>'Thêm mới tài khoản',
        ]);
        Permission::create([
            'name'=>'users-detail',
            'display_name'=>'Xem chi tiết tài khoản',
        ]);
        Permission::create([
            'name'=>'users-roles',
            'display_name'=>'Quản lý vai trò tài khoản',
        ]);
        Permission::create([
            'name'=>'users-edit',
            'display_name'=>'Cập nhật tài khoản',
        ]);
        Permission::create([
            'name'=>'users-delete',
            'display_name'=>'Xóa tài khoản',
        ]);

        //quan ly vai tro
        Permission::create([
            'name'=>'roles-view',
            'display_name'=>'Xem danh sách vai trò',
        ]);
        Permission::create([
            'name'=>'roles-add',
            'display_name'=>'Thêm mới vai trò',
        ]);
        Permission::create([
            'name'=>'roles-permissions',
            'display_name'=>'Quản lý quyền hạn vài trò',
        ]);
        Permission::create([
            'name'=>'roles-edit',
            'display_name'=>'Cập nhật vài trò',
        ]);
        Permission::create([
            'name'=>'roles-delete',
            'display_name'=>'Xóa vài trò',
        ]);

        //quyen han
        Permission::create([
            'name'=>'permissions-view',
            'display_name'=>'Xem danh sách quyền hạn',
        ]);

        //quan ly khoa hoc
        Permission::create([
            'name'=>'courses-view',
            'display_name'=>'Xem danh sách khóa học',
        ]);
        Permission::create([
            'name'=>'courses-add',
            'display_name'=>'Thêm mới khóa học',
        ]);
        Permission::create([
            'name'=>'courses-detail',
            'display_name'=>'Xem chi tiết khóa học',
        ]);
        Permission::create([
            'name'=>'courses-edit',
            'display_name'=>'Cập nhật khóa học',
        ]);
        Permission::create([
            'name'=>'courses-delete',
            'display_name'=>'Xóa khóa học',
        ]);

        //classroom
        Permission::create([
            'name'=>'classroom-view',
            'display_name'=>'Xem danh sách lớp học',
        ]);
        Permission::create([
            'name'=>'classroom-detail',
            'display_name'=>'Xem chi tiết lớp học',
        ]);

        Permission::create([
            'name'=>'classroom-add',
            'display_name'=>'Thêm mới lớp học',
        ]);
        Permission::create([
            'name'=>'classroom-edit',
            'display_name'=>'Cập nhật lớp học',
        ]);
        Permission::create([
            'name'=>'classroom-delete',
            'display_name'=>'Xóa lớp học',
        ]);

        Permission::create([
            'name'=>'classroom-duplicate',
            'display_name'=>'Duplicate lớp học',
        ]);

        //unit in classroom
        Permission::create([
            'name'=>'classroom-unit-add',
            'display_name'=>'Thêm mới bài học',
        ]);
        Permission::create([
            'name'=>'classroom-unit-rollup',
            'display_name'=>'Điểm danh học viên',
        ]);
        Permission::create([
            'name'=>'classroom-unit-edit',
            'display_name'=>'Cập nhật nội dung bài học',
        ]);
        Permission::create([
            'name'=>'classroom-unit-view-list-submission-assignment',
            'display_name'=>'Xem danh sách nộp bài tập',
        ]);
        Permission::create([
            'name'=>'classroom-unit-delete',
            'display_name'=>'Xóa nội dung bài học',
        ]);

        //theories group
        Permission::create([
            'name'=>'coursewares-view',
            'display_name'=>'Xem danh sách nhóm lý thuyết',
        ]);
        Permission::create([
            'name'=>'coursewares-add',
            'display_name'=>'Thêm mới nhóm lý thuyết',
        ]);
        Permission::create([
            'name'=>'coursewares-edit',
            'display_name'=>'Cập nhật nhóm lý thuyết',
        ]);
        Permission::create([
            'name'=>'coursewares-delete',
            'display_name'=>'Xóa nhóm lý thuyết',
        ]);

        // theories
        Permission::create([
            'name'=>'coursewares-theories',
            'display_name'=>'Xem danh sách lý thuyết thuộc nhóm lý thuyết',
        ]);

        Permission::create([
            'name'=>'coursewares-theories-add',
            'display_name'=>'Thêm mới lý thuyết',
        ]);

        Permission::create([
            'name'=>'coursewares-theories-detail',
            'display_name'=>'Xem chi tiết lý thuyết',
        ]);http://bitbucket.org

        Permission::create([
            'name'=>'coursewares-theories-edit',
            'display_name'=>'Cập nhật lý thuyết',
        ]);
        Permission::create([
            'name'=>'coursewares-theories-delete',
            'display_name'=>'Xóa lý thuyết',
        ]);

        //exercises group
        Permission::create([
            'name'=>'group-exercises-view',
            'display_name'=>'Xem danh sách nhóm bài tập',
        ]);
        Permission::create([
            'name'=>'group-exercises-add',
            'display_name'=>'Thêm mới nhóm bài tập',
        ]);
        Permission::create([
            'name'=>'group-exercises-edit',
            'display_name'=>'Cập nhật nhóm bài tập',
        ]);
        Permission::create([
            'name'=>'group-exercises-delete',
            'display_name'=>'Xóa nhóm bài tập',
        ]);

        // exercises
        Permission::create([
            'name'=>'exercises-list',
            'display_name'=>'Xem danh sách bài tập thuộc nhóm bài tập',
        ]);

        Permission::create([
            'name'=>'exercises-add',
            'display_name'=>'Thêm mới bài tập + lời giải',
        ]);

        Permission::create([
            'name'=>'exercises-detail',
            'display_name'=>'Xem chi tiết bài tập',
        ]);

        Permission::create([
            'name'=>'exercises-edit',
            'display_name'=>'Cập nhật bài tập',
        ]);
        Permission::create([
            'name'=>'exercises-answer',
            'display_name'=>'Cập nhật lời giải',
        ]);

        Permission::create([
            'name'=>'exercises-delete',
            'display_name'=>'Xóa bài tập',
        ]);

        Permission::create([
            'name'=>'classroom-unit-rollup-student',
            'display_name'=>'Điểm danh học viên',
        ]);
        Permission::create([
            'name'=>'classroom-unit-rollup-teacher',
            'display_name'=>'Điểm danh giáo viên - trợ giảng',
        ]);
        Permission::create([
            'name'=>'students-view',
            'display_name'=>'Quản lý học viên',
        ]);
        Permission::create([
            'name'=>'students-detail',
            'display_name'=>'Xem chi tiết học viên',
        ]);
        Permission::create([
            'name'=>'students-add',
            'display_name'=>'Thêm mới học viên',
        ]);
        Permission::create([
            'name'=>'students-edit',
            'display_name'=>'Cập nhật thông tin học viên',
        ]);
        Permission::create([
            'name'=>'students-delete',
            'display_name'=>'Xóa học viên',
        ]);
        Permission::create([
            'name'=>'students-care-view',
            'display_name'=>'Chăm sóc học viên',
        ]);
        Permission::create([
            'name'=>'classroom-unit-view-unit',
            'display_name'=>'Xem danh sách bài học',
        ]);
        Permission::create([
            'name'=>'classroom-unit-view-students',
            'display_name'=>'Xem danh sách học viên',
        ]);

        Permission::create([
            'name'=>'classroom-unit-add-students',
            'display_name'=>'Thêm mới học viên vào lớp',
        ]);

        Permission::create([
            'name'=>'classroom-unit-delete-students',
            'display_name'=>'Xóa học viên khỏi lớp',
        ]);

        Permission::create([
            'name'=>'classroom-unit-view-notifications',
            'display_name'=>'Quản lý thông báo lớp',
        ]);

        Permission::create([
            'name'=>'classroom-unit-send-notifications',
            'display_name'=>'Gửi báo cho lớp',
        ]);

        Permission::create([
            'name'=>'classroom-unit-lession',
            'display_name'=>'Xem slide bài giảng',
        ]);

        Permission::create([
            'name'=>'users-courseware',
            'display_name'=>'Phân quyền quản lý học liệu',
        ]);

        //student enroll
        Permission::create([
            'name'=>'students-enroll',
            'display_name'=>'Xem danh sách học viên đăng ký',
        ]);
        Permission::create([
            'name'=>'students-enroll-confirm',
            'display_name'=>'Xác nhận học viên đăng ký',
        ]);
        Permission::create([
            'name'=>'students-enroll-delete',
            'display_name'=>'Xóa học viên đăng ký',
        ]);

        //news
        Permission::create([
            'name'=>'posts-index',
            'display_name'=>'Xem danh sách bài viết',
        ]);
        Permission::create([
            'name'=>'posts-add',
            'display_name'=>'Thêm mới bài viết',
        ]);
        Permission::create([
            'name'=>'posts-view',
            'display_name'=>'Xem chi tiết bài viết',
        ]);
        Permission::create([
            'name'=>'posts-edit',
            'display_name'=>'Cập nhật bài viết',
        ]);
        Permission::create([
            'name'=>'posts-delete',
            'display_name'=>'Xóa bài viết',
        ]);
        //category

        Permission::create([
            'name'=>'categories-index',
            'display_name'=>'Xem danh mục',
        ]);

        Permission::create([
            'name'=>'categories-add',
            'display_name'=>'Thêm mới danh mục',
        ]);

        Permission::create([
            'name'=>'categories-edit',
            'display_name'=>'Cập nhật danh mục',
        ]);

        Permission::create([
            'name'=>'categories-delete',
            'display_name'=>'Xóa danh mục',
        ]);

        //tag
        Permission::create([
            'name'=>'tags-index',
            'display_name'=>'Xem danh sách tags',
        ]);

        Permission::create([
            'name'=>'tags-add',
            'display_name'=>'Thêm mới tag',
        ]);

        Permission::create([
            'name'=>'tags-edit',
            'display_name'=>'Cập nhật tag',
        ]);

        Permission::create([
            'name'=>'tags-delete',
            'display_name'=>'Xóa tag',
        ]);
        //thuong add

        Permission::create([
            'name'=>'time-keeping-list',
            'display_name'=>'Chấm công - Xem danh sách',
        ]);
        Permission::create([
            'name'=>'time-keeping-confirm',
            'display_name'=>'Chấm công - Xác nhận đi dạy và trợ giảng',
        ]);

        Permission::create([
            'name'=>'system-manager-menu',
            'display_name'=>'Menu quản trị Zent',
            'description' => 'Hiển thị chứa các chức năng liên quan đến quản lý, điều hành Zent',
        ]);
        Permission::create([
            'name'=>'classroom-unit-view-study-group-add',
            'display_name'=>'Học nhóm - Thêm buổi học nhóm',
            'description' => 'Quyền thêm 1 buổi học nhóm',
        ]);
        Permission::create([
            'name'=>'classroom-unit-view-study-group',
            'display_name'=>'Học nhóm - Xem tab học nhóm',
            'description' => 'Quyền xem tab buổi học nhóm',
        ]);
        Permission::create([
            'name'=>'study-group-rollup-teacher',
            'display_name'=>'Học nhóm - Điểm danh giảng viên, trợ giảng',
        ]);
        Permission::create([
            'name'=>'study-group-delete',
            'display_name'=>'Học nhóm - Xóa buổi học nhóm',
        ]);
        Permission::create([
            'name'=>'study-group-rollup-student',
            'display_name'=>'Học nhóm - Điểm danh học viên',
        ]);
        Permission::create([
            'name'=>'study-group-rollup',
            'display_name'=>'Học nhóm - Button vào chức năng điểm danh',
        ]);
        Permission::create([
            'name'=>'classroom-statistic',
            'display_name'=>'Xem thống kê báo cáo lớp học',
        ]);
        Permission::create([
            'name'=>'finance-class-menu',
            'display_name'=>'Menu thu học phí',
        ]);
        Permission::create([
            'name'=>'finance-class-list-view',
            'display_name'=>'Xem danh sách lớp chưa quyết toán',
        ]);
        Permission::create([
            'name'=>'finance-class-detail',
            'display_name'=>'Xem danh sách học viên nộp học phí theo lớp',
        ]);
        Permission::create([
            'name'=>'finance-student-update',
            'display_name'=>'Cập nhật học phí cho học viên theo lớp',
        ]);
        Permission::create([
            'name'=>'finance-student-detail',
            'display_name'=>'Xem danh sách các lần nộp học phí của học viên theo lớp',
        ]);
        Permission::create([
            'name'=>'finance-student-bill-create',
            'display_name'=>'Tạo mới phiếu thu',
        ]);
        Permission::create([
            'name'=>'finance-student-bill-update',
            'display_name'=>'Sửa phiếu thu',
        ]);
        Permission::create([
            'name'=>'finance-student-bill-delete',
            'display_name'=>'Xóa phiếu thu',
        ]);
        Permission::create([
            'name'=>'finance-student-bill-email',
            'display_name'=>'Gửi mail phiếu thu',
        ]);
        Permission::create([
            'name'=>'finance-student-bill-print',
            'display_name'=>'In phiếu thu',
        ]);
        Permission::create([
            'name'=>'systems-logs',
            'display_name'=>'Quản lý logs hệ thống',
        ]);
        Permission::create([
            'name'=>'systems-backup',
            'display_name'=>'Backup database',
        ]);

        // chinh sach giam hoc phi
        Permission::create([
            'name'=>'policies-view',
            'display_name'=>'Xem danh sách chính sách giảm học phí',
        ]);

        Permission::create([
            'name'=>'policies-add',
            'display_name'=>'Thêm mới chính sách giảm học phí',
        ]);

        Permission::create([
            'name'=>'policies-edit',
            'display_name'=>'Cập nhật chính sách giảm học phí',
        ]);

        Permission::create([
            'name'=>'policies-delete',
            'display_name'=>'Xóa chính sách giảm học phí',
        ]);

        // danh sach bai hoc
        Permission::create([
            'name'=>'lessons-view',
            'display_name'=>'Xem danh sách bài học trong khóa học',
        ]);

        Permission::create([
            'name'=>'lessons-add',
            'display_name'=>'Tạo bài học trong khóa học',
        ]);

        Permission::create([
            'name'=>'lessons-edit',
            'display_name'=>'Sửa bài học trong khóa học',
        ]);

        Permission::create([
            'name'=>'lessons-delete',
            'display_name'=>'Xóa bài học trong khóa học',
        ]);

        Permission::create([
            'name'=>'show-hide-unit',
            'display_name'=>'Ẩn/hiện bài học',
        ]);

        Permission::create([
            'name'=>'break-class-room',
            'display_name'=>'Bảo lưu lớp học',
        ]);

        Permission::create([
            'name'=>'slides-index',
            'display_name'=>'Danh sách slides',
        ]);
        Permission::create([
            'name'=>'slides-add',
            'display_name'=>'Thêm slide',
        ]);
        Permission::create([
            'name'=>'slides-edit',
            'display_name'=>'Sửa slide',
        ]);
        Permission::create([
            'name'=>'slides-delete',
            'display_name'=>'Xóa slide',
        ]);

        Permission::create([
            'name'=>'image-manage-index',
            'display_name'=>'Danh sách hình ảnh',
        ]);
        Permission::create([
            'name'=>'image-manage-add',
            'display_name'=>'Thêm thông tin hình ảnh',
        ]);
        Permission::create([
            'name'=>'image-manage-edit',
            'display_name'=>'Sửa thông tin hình ảnh',
        ]);
        Permission::create([
            'name'=>'image-manage-delete',
            'display_name'=>'Xóa hình ảnh',
        ]);

        // Ha Cong Thanh add 11/05/2018 - Banned student
        Permission::create([
            'name'=>'classroom-unit-banned-students',
            'display_name'=>'Cấm học viên vào lớp',
        ]);

        // 14/5/2108 - Accept recharge
        Permission::create([
            'name'=>'accept-recharge-view',
            'display_name'=>'Xem danh sách các đơn nạp tiền',
        ]);

        Permission::create([
            'name'=>'accept-recharge-accept',
            'display_name'=>'Xác nhận đơn nạp tiền',
        ]);

        Permission::create([
            'name'=>'accept-recharge-delete',
            'display_name'=>'Xóa đơn nạp tiền',
        ]);

        Permission::create([
            'name'=>'event-index',
            'display_name'=>'Danh sách sự kiện',
        ]);
        Permission::create([
            'name'=>'event-add',
            'display_name'=>'Thêm sự kiện mới',
        ]);
        Permission::create([
            'name'=>'event-edit',
            'display_name'=>'Sửa thông tin sự kiện',
        ]);
        Permission::create([
            'name'=>'event-delete',
            'display_name'=>'Xóa sự kiện',
        ]);
        // Tran Thi Nga add 16/05/2018 - Recruitment
        Permission::create([
            'name'=>'recruitment-manage',
            'display_name'=>'Quản lý tin tuyển dụng',
            // End Nga
        ]);

        Permission::create([
            'name' => 'admin-confirm',
            'display_name' => 'Admin xác nhận có mặt',
        ]);

        Permission::create([
            'name' => 'manager-confirm',
            'display_name' => 'Quản lý xác nhận có mặt',
        ]);
        Permission::create([
            'name' => 'time-keeping-statistical-list',
            'display_name' => 'QL - Xem danh sách thống kê giờ dạy',
        ]);
        Permission::create([
            'name' => 'create-statistical-docs',
            'display_name' => 'QL - Tạo phiếu thống kê giờ dạy',
        ]);
        Permission::create([
            'name' => 'waiting-list',
            'display_name' => 'Chuyển học viên vào danh sách chờ lớp',
        ]);

        //Email log
        Permission::create([
            'name' => 'email-log-list',
            'display_name' => 'Xem danh sách Mail Log',
        ]);

        Permission::create([
            'name' => 'email-log-delete',
            'display_name' => 'Xoá email log',
        ]);

        Permission::create([
            'name' => 'email-log-send',
            'display_name' => 'gửi mail',
        ]);

        Permission::create([
            'name' => 'birthday',
            'display_name' => 'danh sách sinh nhật',
        ]);

        Permission::create([
            'name' => 'birthday-task',
            'display_name' => 'công việc chúc mừng sinh nhật',
        ]);

        Permission::create([
            'name' => 'birthday-add',
            'display_name' => 'tạo mới sinh nhật',
        ]);

        // End Email Log
        Permission::create([
            'name' => 'fi-classroom-analyst',
            'display_name' => 'QL - Xem thống kê thu - chi theo lớp',
        ]);

        Permission::create([
            'name' => 'finance-user',
            'display_name' => 'Xem thống kê lương, giờ dạy, tạo phiếu thanh toán lương',
        ]);

        Permission::create([
            'name' => 'accountant-confirm-salary',
            'display_name' => 'Kế toán xác nhận phiếu thanh toán lương',
        ]);

        Permission::create([
            'name' => 'manager-confirm-salary',
            'display_name' => 'Quản lý xác nhận phiếu thanh toán lương',
        ]);

        // Dashboard

        Permission::create([
            'name'  =>  'administrator-finance',
            'display_name'  =>  'Administrator tài chính, xác nhận giờ dạy, chấm công'
        ]);

        Permission::create([
            'name'  =>  'teacher-finance',
            'display_name'  =>  'Giảng viên / trợ giảng xác nhận chấm công, thanh toán lương'
        ]);

        // Tran Thi Nga add 30/05/2018 - Social_post
        Permission::create([
            'name' => 'social-post',
            'display_name' => 'Quản lý Facebook - Youtube',
        ]);

        Permission::create([
            'name'  =>  'dashboard-about-view',
            'display_name'  =>  'Xem tóm tắt thông tin nhân viên, học viên, khóa học, lớp'
        ]);

        Permission::create([
            'name'  =>  'dashboard-admin-timekeeping',
            'display_name'  =>  'BĐK - Xác nhận giờ giảng dạy',
        ]);

        Permission::create([
            'name'  =>  'dashboard-user-timekeeping',
            'display_name'  =>  'BĐK - Xem danh sách buổi giảng dạy gần nhất',
        ]);

        Permission::create([
            'name'  =>  'dashboard-user-wallet',
            'display_name'  =>  'BĐK - Xem thông tin tài khoản, 5 giao dịch gần nhất',
        ]);

        Permission::create([
            'name'  =>  'dashboard-user-student-low-score',
            'display_name'  =>  'BĐK - Xem danh sách 5 học viên thấp điểm nhất lớp',
        ]);

        // them quyen vi nhan vien
        Permission::create([
            'name'  =>  'user-wallet',
            'display_name'  =>  'Quản lý ví nhân viên',
        ]);

        Permission::create([
            'name'  =>  'dashboard-user-tech-schedule',
            'display_name'  =>  'BĐK - Lịch dạy trong ngày',
        ]);

        Permission::create([
            'name'  =>  'student-wait-classrooms',
            'display_name'  =>  'Quản lý học viên chờ lớp'
        ]);

        Permission::create([
            'name'  =>  'move-student-to-classroom',
            'display_name'  =>  'Chuyển học viên vào lớp'
        ]);

        Permission::create([
            'name'  =>  'delete-student-wait-classroom',
            'display_name'  =>  'Xóa học viên chờ lớp khỏi danh sách'
        ]);

        Permission::create([
            'name'  =>  'ledger-list',
            'display_name'  =>  'Xem sổ cái'
        ]);

        Permission::create([
            'name'  =>  'other-cost-list',
            'display_name'  =>  'Xem danh sách phiếu thu - chi khác'
        ]);

        Permission::create([
            'name'  =>  'other-cost-create',
            'display_name'  =>  'Tạo phiếu thu - chi khác',
        ]);

        Permission::create([
            'name'  =>  'other-cost-accountant-confirm',
            'display_name'  =>  'Kế toán xác nhận phiếu thu - chi khác',
        ]);

        Permission::create([
            'name'  =>  'other-cost-manager-confirm',
            'display_name'  =>  'Quản lý xác nhận phiếu thu - chi khác',
        ]);

        // Start Bao cao thong ke doanh thu
        Permission::create([
            'name'  =>  'statistical-revenue',
            'display_name'  =>  'Báo cáo thống kê doanh thu'
        ]);

        Permission::create([
            'name'=>'students-care',
            'display_name'=>'Chăm sóc học viên bên quản lý học viên',
        ]);

        // End

        Permission::create([
            'name'          =>  'rollback-money-ledger',
            'display_name'  =>  'Hoàn lại tiền phạt'
        ]);

        Permission::create([
            'name'          =>  'view-contacts',
            'display_name'  =>  'Quản lý liên hệ'
        ]);

        Permission::create([
            'name'          =>  'add-contacts',
            'display_name'  =>  'Thêm liên hệ'
        ]);

        Permission::create([
            'name'          =>  'edit-contacts',
            'display_name'  =>  'Chỉnh sửa liên hệ'
        ]);

        Permission::create([
            'name'          =>  'delete-contacts',
            'display_name'  =>  'Xóa liên hệ'
        ]);

        Permission::create([
            'name'          =>  'detail-contacts',
            'display_name'  =>  'Xem chi tiết liên hệ'
        ]);

        // partners

        Permission::create([
            'name'          =>  'view-partners',
            'display_name'  =>  'Quản lý đối tác'
        ]);

        Permission::create([
            'name'          =>  'add-partners',
            'display_name'  =>  'Thêm đối tác'
        ]);

        Permission::create([
            'name'          =>  'edit-partners',
            'display_name'  =>  'Chỉnh sửa đối tác'
        ]);

        Permission::create([
            'name'          =>  'delete-partners',
            'display_name'  =>  'Xóa đối tác'
        ]);

        Permission::create([
            'name'          =>  'detail-partners',
            'display_name'  =>  'Xem chi tiết đối tác'
        ]);


        // 31/07
        Permission::create([
            'name'        =>  'edit-amount-reduce',
            'display_name'  =>  'Chỉnh sửa số tiền giảm học phí'
        ]);

        Permission::create([
            'name'        =>  'view-history-exchange-class-rooms',
            'display_name'  =>  'Xem lịch sử giao dịch của học viên trong lớp'
        ]);

        Permission::create([
            'name'        =>  'view-feedbacks',
            'display_name'  =>  'Xem danh sách feedback'
        ]);

        Permission::create([
            'name'        =>  'feedbacks-detail',
            'display_name'  =>  'Xem chi tiết feedback'
        ]);

        Permission::create([
            'name'        =>  'feedbacks-create',
            'display_name'  =>  'Thêm feedback'
        ]);

        Permission::create([
            'name'        =>  'feedbacks-update',
            'display_name'  =>  'Chỉnh sửa feedback'
        ]);

        Permission::create([
            'name'        =>  'feedbacks-delete',
            'display_name'  =>  'Xóa feedback'
        ]);
    }
}
