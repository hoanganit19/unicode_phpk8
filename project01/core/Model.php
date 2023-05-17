<?php

namespace Core;

use Core\Database\Database;

class Model
{
    use Database;

    public function paginate($sql, $limit)
    {
        $count = $this->count($sql);

        $maxPage = ceil($count / $limit);

        if (request()->page && request()->page<=$maxPage) {
            $page = request()->page;
        } else {
            $page = 1;
        }

        //Tính offset
        $offset = ($page - 1) * $limit;

        $sql.=' LIMIT '.$limit.' OFFSET '.$offset;

        return [
            'data' => $this->get($sql),
            'paginate' => [
                'maxPage' => $maxPage,
                'currentPage' => $page
            ]
        ];
    }

    public function links($lists)
    {
        $paginate = $lists['paginate'];
        //Max page
        $maxPage = $paginate['maxPage'];
        $currentPage = $paginate['currentPage'];

        //Current page: Lấy được từ request
        $html = '<ul class="pagination">';

        if ($currentPage>1) {
            $prevPage = $currentPage-1;

            $html.='<li class="page-item"><a class="page-link" href="?page='.$prevPage.'">Trước</a></li>';
        }

        for ($page = 1; $page <= $maxPage; $page++) {
            $active = $page == $currentPage ? ' active' : '';
            $html.='<li class="page-item'.$active.'"><a class="page-link" href="?page='.$page.'">'.$page.'</a></li>';
        }

        if ($currentPage < $maxPage) {
            $nextPage = $currentPage+1;
            $html.='<li class="page-item"><a class="page-link" href="?page='.$nextPage.'">Sau</a></li>';
        }

        $html.='</ul>';

        return $html;
    }

    public function buildWhere($filters)
    {
        $where = [];
        if (!empty($filters)) {
            foreach ($filters as $key => $value) {
                if (!empty($key)) {
                    if (strpos($key, 'LIKE')!==false) {
                        $where[] = $key." '".$value."'";
                    } else {
                        $where[] = $key."='".$value."'";
                    }
                } else {
                    $where[] = "($key $value)";
                }
            }
        }

        $where = implode(' AND ', $where);

        if (!empty($where)) {
            $where = 'WHERE '.$where;
        }

        return $where;
    }

    public function __call($method, $args = [])
    {
        echo $method;
    }
}
