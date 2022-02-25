<?php

namespace Ysheng\Meituan;

class Goods extends BaseClient
{
    // 总部-获取菜品（分页）
    public function getGoods($param)
    {
        $url = 'rms/pos/api/v1/chain/goods/query';
        $data = [
            'orgId' => $param['orgId'],
            'req' => [ // 需设置req.spuType=10
                'spuType' => 10
            ],
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-获取菜品分类（分页）
    public function getShopCate($param)
    {
        $url = 'rms/pos/api/v1/poi/category/query';
        $data = [
            'orgId' => $param['orgId'],
            'req' => [
                'pageNo' => $param['pageNo'], // 页码
                'pageSize' => $param['pageSize'] // 页码大小
            ],
        ];

        return $this->request($url, $data, 18);
    }

    // 查询总部外卖菜品接口
    public function getWmGoods($param)
    {
        $url = 'rms/pos/api/v1/chain/wm/goods/query';
        $data = [
            'orgId' => $param['orgId'], // 机构ID
            'req' => [ // 需设置req.spuType=10
                'spuType' => 10, // spu类型，10.菜品
                'pageNo' => $param['pageNo'], // 页码
                'pageSize' => $param['pageSize'], // 页码大小
                // 'showTaxRateDepartment' => $param['showTaxRateDepartment'], // 税率信息展示：1展示，默认不展示
                'wmSource' => $param['wmSource'], // 外卖来源：1-美团，2-饿了么
            ],
        ];

        return $this->request($url, $data, 18);
    }

    // 查询总部外卖分类接口
    public function getWmcate($param)
    {
        $url = 'rms/pos/api/v1/chain/wm/category/query';
        $data = [
            'orgId' => $param['orgId'], // 机构ID
            'req' => [
                // 'brandId' => $param['brandId'], // 品牌id
                'wmSource' => $param['wmSource'], // 外卖来源：1-美团外卖，2-饿了么外卖
                'pageNo' => $param['pageNo'], // 页码
                'pageSize' => $param['pageSize'], // 页大小
            ],
        ];

        return $this->request($url, $data, 18);
    }

    // 总部-获取套餐（分页）
    public function getPackage($param)
    {
        $url = 'rms/pos/api/v1/chain/combo/query';
        $data = [
            'orgId' => $param['orgId'],
            'req' => [
                'pageNo' => $param['pageNo'], // 页码
                'pageSize' => $param['pageSize'] // 页码大小
            ],
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-获取规格（分页）
    public function getShopSpecs($param)
    {
        $url = 'rms/pos/api/v1/poi/specs/query';
        $data = [
            'orgId' => $param['orgId'],
            'req' => [],
        ];

        return $this->request($url, $data, 18);
    }

    // 总部-查询菜品分类
    public function getCate($param)
    {
        $url = 'rms/pos/api/v1/chain/category/query';
        $data = [
            'orgId' => $param['orgId'],
            'req' => [
                'pageNo' => $param['pageNo'], // 页码
                'pageSize' => $param['pageSize'] // 页码大小
            ],
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-获取菜品（分页）
    public function getShopGoods($param)
    {
        $url = 'rms/pos/api/v1/poi/goods/query';
        $data = [
            'orgId' => $param['orgId'],
            'req' => [ // 需设置req.spuType=10
                'spuType' => 10, // 类型，10.菜品
                'pageNo' => $param['pageNo'], // 页码
                'pageSize' => $param['pageSize'], // 页码大小
                // 'orQuery' =>[ // 查询条件
                //     // 'showSideGoods' => 0, // 是否显示加料：0-否，1-是
                // ]
            ],
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-获取做法(分页)
    public function getShopMethod($param)
    {
        $url = 'rms/pos/api/v1/poi/method/query';
        $data = [
            'orgId' => $param['orgId'],
            'req' => [ // 需设置req.spuType=10
                'pageNo' => $param['pageNo'], // 页码
                'pageSize' => $param['pageSize'], // 页码大小
            ],
        ];

        return $this->request($url, $data, 18);
    }

    // 总部-获取做法(分页)
    public function getMethod($param)
    {
        $url = 'rms/pos/api/v1/chain/method/query';
        $data = [
            'orgId' => $param['orgId'],
            'req' => [
                'pageNo' => $param['pageNo'], // 页码
                'pageSize' => $param['pageSize'], // 页码大小
            ],
        ];

        return $this->request($url, $data, 18);
    }

    // 总部-获取规格（分页）
    public function getSpecs($param)
    {
        $url = 'rms/pos/api/v1/chain/specs/query';
        $data = [
            'orgId' => $param['orgId'],
            'req' => [
                'pageNo' => $param['pageNo'], // 页码
                'pageSize' => $param['pageSize'], // 页码大小
            ],
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-获取套餐（分页）
    public function getShopPackage($param)
    {
        $url = 'rms/pos/api/v1/poi/combo/query';
        $data = [
            'orgId' => $param['orgId'],
            'req' => [
                'pageNo' => $param['pageNo'], // 页码
                'pageSize' => $param['pageSize'], // 页码大小
            ],
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-获取外卖菜品分类（分页）
    public function getShopWmGoodsCate($param)
    {
        $url = 'rms/pos/api/v1/poi/goods/wmgoods/category/query';
        $data = [
            'orgId' => $param['orgId'],
            'req' => [
                'type' => 2, // 固定传2
                // 'source' => 1, // 外卖来源：1-美团外卖，2-饿了么外卖
                'pageNo' => $param['pageNo'], // 页码
                'pageSize' => $param['pageSize'], // 页码大小
            ],
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-获取外卖菜品（分页）
    public function getShopWmGoods($param)
    {
        $url = 'rms/pos/api/v1/poi/goods/wmgoods/query';
        $data = [
            'orgId' => $param['orgId'],
            'req' => [
                // 'source' => $param['source'], // 外卖来源：1-美团外卖，2-饿了么外卖
                'pageNo' => $param['pageNo'], // 页码
                'pageSize' => $param['pageSize'], // 页码大小
            ],
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-根据日期获取结算时间
    public function getShopCleartime($param)
    {
        $url = 'rms/pos/api/v1/poi/configs/cleartime/querybydate';
        $data = [
            'orgId' => $param['orgId'],
        ];

        isset($param['dateString']) ?? ($data['dateString'] = $param['dateString']); // 默认当前日期 自然日日期 2020-03-21

        return $this->request($url, $data, 18);
    }

    // 总部-通过skuid批量获取规格历史记录
    public function getSpecsHistory($param)
    {
        $url = 'rms/pos/api/v1/chain/specs/querybysku';
        $data = [
            'orgId' => $param['orgId'],
            'req' => [
                'skuIds' => [],
            ],
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-获取门店合作方式
    public function getShopOperation($param)
    {
        $url = 'rms/pos/api/v1/poi/operation/query';
        $data = [
            'orgId' => $param['orgId'], // 门店的组织机构id
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-通过skuid批量获取规格历史记录
    public function getShopSpecsHistory($param)
    {
        $url = 'rms/pos/api/v1/poi/specs/querybysku';
        $data = [
            'orgId' => $param['orgId'],
            'req' => [
                'skuIds' => [],
            ],
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-获取订金报表流水
    public function getShopRecords($param)
    {
        $url = 'rms/deposit/api/v1/poi/records/query';
        $data = [
            'orgId' => $param['orgId'],
            'beginTime' => $param['beginTime'], // 起始营业时间 1586766401000
            'endTime' => $param['endTime'], // 截止营业时间 1586766401000
            'pageNo' => $param['pageNo'], // 页码
            'pageSize' => $param['pageSize'], // 页行数
        ];

        return $this->request($url, $data, 18);
    }

    // 总部-获取菜品分类v2（税率）
    public function getCate2($param)
    {
        $url = 'rms/pos/api/v2/chain/category/query';
        $data = [
            'orgId' => $param['orgId'],
            'req' => [
                'pageNo' => $param['pageNo'], // 页码
                'pageSize' => $param['pageSize'], // 页码大小
                // 'showBox' => $param['showBox'],
                // 'showSide'=> $param['showSide'],
            ],
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-获取菜品v2（税率）
    public function getShopGoods2($param)
    {
        $url = 'rms/pos/api/v2/poi/goods/query';
        $data = [
            'orgId' => $param['orgId'],
            'req' => [ // 需设置req.spuType=10
                'spuType' => 10, // 类型：10.菜品，20.套餐，40.加料，50.餐盒
                'pageNo' => $param['pageNo'], // 页码
                'pageSize' => $param['pageSize'], // 页码大小
                // 'showTaxRateDepartment' => $param['showTaxRateDepartment'], // 税率信息展示：1展示，默认不展示
            ],
        ];

        return $this->request($url, $data, 18);
    }

    // 总部-获取员工基本信息
    public function getStaffs($param)
    {
        $url = 'rms/pos/api/v1/chain/staffs/query';
        $data = [
            'orgId' => $param['orgId'],
            'req' => [
                'pageNo' => $param['pageNo'], // 页码
                'pageSize' => $param['pageSize'], // 页码大小
                // 'staffName' => $param['staffName'], // 员工姓名
            ],
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-获取门店外卖菜品v2（税率）
    public function getShopWmGoods2($param)
    {
        $url = 'rms/pos/api/v2/poi/goods/wmgoods/query';
        $data = [
            'orgId' => $param['orgId'],
            'req' => [
                // 'wmSource' => 1, // 外卖来源：1-美团外卖，2-饿了么外卖
                'pageNo' => $param['pageNo'], // 页码
                'pageSize' => $param['pageSize'], // 页码大小
            ],
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-获取员工基本信息
    public function getShopStaffs($param)
    {
        $url = 'rms/pos/api/v1/poi/staffs/query';
        $data = [
            'orgId' => $param['orgId'],
            'req' => [
                'pageNo' => $param['pageNo'], // 页码
                'pageSize' => $param['pageSize'], // 页码大小
                // 'staffName' => $param['staffName'], // 员工姓名
            ],
        ];

        return $this->request($url, $data, 18);
    }

    // 总部-获取菜品v2（税率）
    public function getGoods2($param)
    {
        $url = 'rms/pos/api/v2/chain/goods/query';
        $data = [
            'orgId' => $param['orgId'],
            'req' => [ // 需设置req.spuType=10
                'spuType' => 10, // spu类型，10.菜品
                'pageNo' => $param['pageNo'], // 页码
                'pageSize' => $param['pageSize'], // 页码大小
                'showTaxRateDepartment' => $param['showTaxRateDepartment'], // 税率信息展示：1展示，默认不展示
            ],
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-获取菜品分类v2（税率）
    public function getWmGoodsCate2($param)
    {
        $url = 'rms/pos/api/v2/poi/category/query';
        $data = [
            'orgId' => $param['orgId'],
            'req' => [
                'pageNo' => $param['pageNo'], // 页码
                'pageSize' => $param['pageSize'], // 页码大小
                // 'boxCanSale' => $param['boxCanSale'],
                // 'sideCanSale' => '$param['sideCanSale'],
            ],
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-获取门店外卖菜品分类v2 （税率）
    public function getShopWmGoodsCate2($param)
    {
        $url = 'rms/pos/api/v2/poi/goods/wmgoods/category/query';
        $data = [
            'orgId' => $param['orgId'],
            'req' => [
                'scenario' => $param['scenario'], // 查询场景 0：分类管理（返回税率、部门，返回收银侧数据，数据可能有延迟，用于分类管理页），1：分类筛选（不返回税率、部门，直接返回外卖侧数据），用于创建外卖菜分类筛选
                'wmSource' => $param['wmSource'], // 外卖来源：1-美团外卖，2-饿了么外卖
                'pageNo' => $param['pageNo'], // 页码
                'pageSize' => $param['pageSize'], // 页码大小
            ],
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-获取经营设置常用备注
    public function getShopSetting($param)
    {
        $url = 'rms/pos/api/v1/poi/configs/setting/comments';
        $data = [
            'orgId' => $param['orgId'], // 组织ID
        ];

        return $this->request($url, $data, 18);
    }

    // 门店-获取活动详情v2 （含折扣率）
    public function getShopPromotions2($param)
    {
        $url = 'rms/pos/api/v2/poi/promotions/campaigns/query';
        $data = [
            'orgId' => $param['orgId'], // 组织机构
            'bizLine' => $param['bizLine'], // 业务线 600
        ];

        return $this->request($url, $data, 18);
    }

    // 总部-获取活动详情v2（含折扣率）
    public function getPromotions2($param)
    {
        $url = 'rms/pos/api/v2/chain/promotions/campaigns/query';
        $data = [
            'orgId' => $param['orgId'], // 组织机构
            'bizLine' => $param['bizLine'], // 业务线 600
        ];

        return $this->request($url, $data, 18);
    }
}
