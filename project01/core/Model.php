<?php

namespace Core;

use Core\Database\Database;

class Model
{
    use Database;

    protected function paginate($sql, $limit)
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

    protected function links($lists, $isParams = false)
    {
        $params = $isParams ? $this->getQueryString() : null;

        $paginate = $lists['paginate'];
        //Max page
        $maxPage = $paginate['maxPage'];
        $currentPage = $paginate['currentPage'];

        //Current page: Lấy được từ request
        $html = '<ul class="pagination">';

        if ($currentPage>1) {
            $prevPage = $currentPage-1;

            $html.='<li class="page-item"><a class="page-link" href="?page='.$prevPage.$params.'">Trước</a></li>';
        }

        for ($page = 1; $page <= $maxPage; $page++) {
            $active = $page == $currentPage ? ' active' : '';
            $html.='<li class="page-item'.$active.'"><a class="page-link" href="?page='.$page.$params.'">'.$page.'</a></li>';
        }

        if ($currentPage < $maxPage) {
            $nextPage = $currentPage+1;
            $html.='<li class="page-item"><a class="page-link" href="?page='.$nextPage.$params.'">Sau</a></li>';
        }

        $html.='</ul>';

        return $html;
    }

    protected function buildWhere($filters)
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

    private function getQueryString()
    {
        $queryArr = [];
        $query = request()->getParams();
        if (!empty($query)) {
            $queryArr = explode('&', $query);
            $currentPage = request()->page; //Lấy current page không xử lý
            $key = array_search('page='.$currentPage, $queryArr);
            if ($key!==false) {
                unset($queryArr[$key]);
            }

        }

        return !empty($queryArr) ? '&'.implode('&', $queryArr) : null;
    }

}
