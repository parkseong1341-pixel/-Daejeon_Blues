<?php
if (!defined('_GNUBOARD_')) exit; // 보안 체크

// 글 작성이 끝나면 무조건 메인으로 이동

// form 게시판만 별도 처리
if ($bo_table === 'form') {

        // 출력 버퍼 비우기 (혹시 남은 내용 제거)
    if (ob_get_length()) ob_end_clean();

    // 기존 그누보드 동작 막기 위해 header 로 바로 이동
    header("Content-Type: text/html; charset=utf-8");

    echo "<script>
        alert('문의가 정상적으로 완료되었습니다.');
        window.location.replace('/'); // 무조건 메인으로 이동 (임시로 가맹문의로 경로 설정)
    </script>";
    exit; // 완전 종료
}
?>