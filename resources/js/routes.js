export const routes = [
    {
        /* Admin */
        path: "/home",
        name: "Home",
        component: () => import("./components/employee/home/home.vue")
    },
    {
        /* Admin */
        path: "/leave",
        name: "Leave",
        component: () => import("./components/employee/leave/leave.vue")
    },
    {
        /* Admin */
        path: "/profile",
        name: "Profile",
        component: () => import("./components/employee/profile/profile.vue")
    },
    {
        /* Admin */
        path: "/chat",
        name: "Chat",
        component: () => import("./components/chat/ChatsComponent.vue")
    },
    {
        /* Admin */
        path: "/admin/home",
        name: "AdminHome",
        component: () => import("./components/admin/home.vue")
    },
    {
        /* Admin */
        path: "/admin/attendance",
        name: "AdminAttendance",
        component: () => import("./components/admin/attendance/attendance.vue")
    },
    {
        /* Admin */
        path: "/admin/employee-profile",
        name: "AdminEmployeeProfile",
        component: () =>
            import("./components/admin/employee_profile/employee_profile.vue")
    },
    {
        /* Admin */
        path: "/admin/leave-management",
        name: "AdminLeaveManagement",
        component: () =>
            import("./components/admin/leave_management/leave_management.vue")
    },
    {
        /* Admin */
        path: "/admin/chat",
        name: "AdminChat",
        component: () => import("./components/admin/chat/chat.vue")
    }
];
