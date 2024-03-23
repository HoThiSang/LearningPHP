## For user :

- Display Course List
- Display Detailed Course Information
- Watch Lecture Videos
- Download Lecture Documents
- Take Lecture Trial
- Register/Login
- Account Page: Personal Information, MyCourses,...
- Purchase Course
- Shopping Cart
- Display News List
- Display Detailed News Information

## For Admin 

- Student Management
- Course Management
- Instructor Management
- Lesson Management
- News Category Management
- News Management
- User Management (System Administration)
- Activate Courses for Students
- System Administration Permissions
- Reporting, Statistics,...

## API 
- Xây dựng API hoàn chỉnh \


## Phân tích database : 
1. Table categories => Quản lý danh mục 
Gồm các thuộc tính : 
- id => integer
- category_name => varchar(200)
- slug => varchar(200)
- parent_id => int 
- created_at => timestamp
- updated_at => timestamp

2. Table courses => Quản lý khóa học 
- id => int 
- course_name => varchar(255)
- slug  => varchar(255)
- detail => text 
- teacher_id => int 
- thumbnail  => varchar(255)
- prrice => float 
- sale_price => float 
- code => varchar(100)
- durations => float 
- id_document => tinyint           
- supports => text 
- status => tinyint 
- created_at => timestamp
- updated_at => timestamp


3. Table lession => Quản lý bài giảng 

- id => int 
- lession_name => varchar(255)
- slug  => varchar(255)
- video_id => int 
- document_id => int 
- parent_id +> int 
- is_trial => tinyint 
- views => int 
- position => int 
- description => text 
- duration => float 
- created_at => timestamp
- updated_at => timestamp


4. Table categories_courses => Bảng trung gian liên kết giữa danh mục và khóa học 

- id => int 
- category_id => int 
- course_id => int 
- created_at => timestamp
- updated_at => timestamp

5. Table teacher => Giảng viên

- id => int 
- teacher_name => varcahr(100)
- slug => varchar => text 
- exp = float 
- image => varchar(255)
- created_at => timestamp
- updated_at => timestamp

6. Table videos = Quản lý video bài giảng 

- id => int 
- video_name = varchar(255)
- url = varchar(255)
- created_at => timestamp
- updated_at => timestamp

7. Table documents => Quản lý tài liệu 
- id => int 
- document_name => varchar(255)
- url => varchar(255)
- size => float 
- created_at => timestamp
- updated_at => timestamp


8. Table categories_post => Quản lý danh mục khóa học 
- id => int 
- name => varchar(255)
- parent_id =>int 
- created_at => timestamp
- updated_at => timestamp
- 
9. Table post => Quản lý danh mục ít thôi
- id => int 
- title => varchar(255) 
- slug => varchar(255) 
- content => text 
- exceprt => text 
- thumbnail => varchar(255)
- category_id => int 
- created_at => timestamp
- updated_at => timestamp

10. table students => Quản lý học viên

- id => int 
- student_name => varchar(100)
- email => varchar(100)
- phone => varchar(20)
- password => varchar(100)
- address => varchar(255)
- status => tinyint 
- created_at => timestamp
- updated_at => timestamp

11. table student_courses 
- id => int 
- student_id => int 
- course_id => int 
- status => tinyint(1)
- created_at => timestamp
- updated_at => timestamp

12. Table order => quản lý đơn hàng của học viên 

- id => int 
- student_id => int 
- course_id => int 
- total => float 
- status => tinyint (1)
- created_at => timestamp
- updated_at => timestamp


13. Table order_detail 
- id => int 
- order_id => int 
- course_id => int 
- price => price 
- status => tinyint(1)
- created_at => timestamp
- updated_at => timestamp


14. Table order_status => Quản lý trạng thái đơn hàng 

- id => int 
- order_status_name => varchar(200)
- created_at => timestamp
- updated_at => timestamp

15. Table users => Quản trị hệ thống

id => int
name => varchar(108)
email => varchar(100)
password => varchar(108)
group_id => int
created_at => timestamp
updated_at => timestamp

16. Table groups => Quản trị nhóm người dùng
id=> int
name => varchar(100)
permissions => text
created_at => timestamp
updated at -> timestamp

17. Table modules => Danh sách các module trong trang quản trị
id > int
name> varchar(100)
title => varchar(200)
role => text

18. Table options => Quân lý các thiết lập

id=> int
name => varchar(100)
value => text