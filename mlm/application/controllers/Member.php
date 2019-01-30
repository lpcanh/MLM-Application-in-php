<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['MemberModel']);
        $this->SeesionModel->not_logged_in();
    }

    public function view_member()
    {
        $this->SeesionModel->is_logged_Admin();

        $id = $this->OuthModel->Encryptor('decrypt', $this->input->get('id'));

        $data['member'] = $this->UserModel->GetUserDataById($id);


        $getChildMember = $this->MemberModel->GetChildMemberById($id);

        $arr = [];
        $Total_nsv2_id[] = $id;
        $Total_nsv3_id = [];
        $Total_nsv4_id = [];
        $Total_nsv5_id = [];
        $Total_nsv6_id = [];
        $Total_nsv7_id = [];


        $total_net_sale_v = [];
        foreach ($getChildMember as $row) {///level 2

            $Total_nsv3_id[] = $row['id'];

            $level_3_loop = $this->MemberModel->GetChildMemberById($row['id']);
            $NetSaleVolume3 = $this->MemberModel->NetSaleVolume($row['id']);
            $total_net_sale_v[] = $NetSaleVolume3;

            $arr_level_3 = [];
            $total_net_sale_v3 = [];
            foreach ($level_3_loop as $level_3) {///level 3

                $Total_nsv4_id[] = $level_3['id'];

                $level_4_loop = $this->MemberModel->GetChildMemberById($level_3['id']);
                $NetSaleVolume4 = $this->MemberModel->NetSaleVolume($level_3['id']);
                $total_net_sale_v3[] = $NetSaleVolume4;

                $arr_level_4 = [];
                $total_net_sale_v4 = [];
                foreach ($level_4_loop as $level_4) {///level 4

                    $Total_nsv4_id[] = $level_4['id'];

                    $level_5_loop = $this->MemberModel->GetChildMemberById($level_4['id']);
                    $NetSaleVolume5 = $this->MemberModel->NetSaleVolume($level_4['id']);
                    $total_net_sale_v4[] = $NetSaleVolume4;

                    $arr_level_5 = [];
                    $total_net_sale_v5 = [];
                    foreach ($level_5_loop as $level_5) {///level 5

                        $Total_nsv5_id[] = $level_5['id'];

                        $level_6_loop = $this->MemberModel->GetChildMemberById($level_5['id']);
                        $NetSaleVolume6 = $this->MemberModel->NetSaleVolume($level_5['id']);
                        $total_net_sale_v5[] = $NetSaleVolume6;

                        $arr_level_6 = [];
                        $total_net_sale_v6 = [];
                        foreach ($level_6_loop as $level_6) {///level 6

                            $Total_nsv6_id[] = $level_6['id'];

                            $level_7_loop = $this->MemberModel->GetChildMemberById($level_6['id']);
                            $NetSaleVolume7 = $this->MemberModel->NetSaleVolume($level_6['id']);
                            $total_net_sale_v6[] = $NetSaleVolume7;
                            $arr_level_7 = [];

                            $total_net_sale_v7 = [];
                            foreach ($level_7_loop as $level_7) {///level 7

                                $Total_nsv7_id[] = $level_7['id'];


                                $NetSaleVolume8 = $this->MemberModel->NetSaleVolume($level_7['id']);
                                $total_net_sale_v7[] = $NetSaleVolume8;


                                $arr_level_7[] = ['member_id' => $level_7['id'], 'member_name' => $level_7['name'], 'NetSaleVol7' => $NetSaleVolume8];
                            }//Level6
                            //
                            $arr_level_6[] = ['member_id' => $level_6['id'], 'member_name' => $level_6['name'], 'L_7' => $arr_level_7, 'NetSaleVol6' => $NetSaleVolume7, 'total_net_sale_v6' => array_sum($total_net_sale_v7) + $NetSaleVolume7];
                        }//Level6

                        $arr_level_5[] = ['member_id' => $level_5['id'], 'member_name' => $level_5['name'], 'L_6' => $arr_level_6, 'NetSaleVol5' => $NetSaleVolume6, 'total_net_sale_v5' => array_sum($total_net_sale_v6) + $NetSaleVolume6];
                    }//Level5

                    $arr_level_4[] = ['member_id' => $level_4['id'], 'member_name' => $level_4['name'], 'L_5' => $arr_level_5,
                        'NetSaleVol4' => $NetSaleVolume5, 'total_net_sale_v4' => array_sum($total_net_sale_v5) + $NetSaleVolume5];
                }//Level4

                $arr_level_3[] = ['member_id' => $level_3['id'], 'member_name' => $level_3['name'], 'L_4' => $arr_level_4,
                    'NetSaleVol3' => $NetSaleVolume4, 'total_net_sale_v3' => array_sum($total_net_sale_v4) + $NetSaleVolume4];


            }//Level3


            $arr[] = [
                'member_id' => $row['id'], 'member_name' => $row['name'],
                'sale2' => $NetSaleVolume3,
                'total_net_sale_v2' => array_sum($total_net_sale_v3) + $NetSaleVolume3,
                'L_3' => $arr_level_3,
            ];

        }//Level2


        /*echo array_sum($total_net_sale_v);
        echo '<br>';
          print_r($Total_nsv3_id);
          echo 'Total : '.count($Total_nsv3_id);
         echo '<br>';

          print_r($Total_nsv4_id);
          echo 'Total : '.count($Total_nsv4_id);
         echo '<br>';
          print_r($Total_nsv5_id);
          echo 'Total : '.count($Total_nsv5_id);
         echo '<br>';
          print_r($Total_nsv6_id);
          echo 'Total : '.count($Total_nsv6_id);
        echo '<br>';
          print_r($Total_nsv7_id);
          echo 'Total : '.count($Total_nsv7_id);


        echo '<br>';

        echo '<br>';
        echo '<br>';



        print_r($total_ids);
         $GrandtotalNetSaleVolume=$this->MemberModel->GrandTotalNetSaleVolume($total_ids);
        echo '<br>';
        echo '<br>';
        echo '<pre>';
        echo $GrandtotalNetSaleVolume1;


        echo '<pre>'; print_r($arr);  die;*/
        $total_ids = array_merge($Total_nsv2_id, $Total_nsv3_id, $Total_nsv4_id, $Total_nsv5_id, $Total_nsv6_id, $Total_nsv7_id);

        $data['teamNetwork'] = count($total_ids);
        $GrandtotalNetSaleVolume = $this->MemberModel->GrandTotalNetSaleVolume($total_ids);
        $data['GrandtotalNetSaleVolume'] = $GrandtotalNetSaleVolume;
        //$this->MemberIncomePercent($GrandtotalNetSaleVolume);


        $NetSaleVolume1 = $this->MemberModel->NetSaleVolume($id);
        $data['total_net_sale_v'] = array_sum($total_net_sale_v) + $NetSaleVolume1;
        $data['NetSaleVolume1'] = $NetSaleVolume1;

        $data['memberlist'] = $arr;

        $this->parser->parse('customer/view_member_template', $data);
    }

    public function login_customer_view()
    {
        $this->parser->parse('customer/view_member_template_angular', []);
    }

    public function view_member_template()
    {

        $id = $this->OuthModel->Encryptor('decrypt', $this->input->get('id'));

        $this->parser->parse('customer/view_member_template_angular', []);
    }

    public function json()
    {


        $id = $this->OuthModel->Encryptor('decrypt', $this->input->get('id'));

        $member = $this->UserModel->GetUserDataById($id);

        $getChildMember = $this->MemberModel->GetChildMemberById($id);

        $arr = [];

        $total_net_sale_v = [];
        foreach ($getChildMember as $row) {///level 2
            $level_3_loop = $this->MemberModel->GetChildMemberById($row['id']);
            $NetSaleVolume3 = $this->MemberModel->NetSaleVolume($row['id']);
            $total_net_sale_v[] = $NetSaleVolume3;

            $arr_level_3 = [];
            $total_net_sale_v3 = [];
            foreach ($level_3_loop as $level_3) {///level 3


                $level_4_loop = $this->MemberModel->GetChildMemberById($level_3['id']);
                $NetSaleVolume4 = $this->MemberModel->NetSaleVolume($level_3['id']);
                $total_net_sale_v3[] = $NetSaleVolume4;

                $arr_level_4 = [];
                $total_net_sale_v4 = [];
                foreach ($level_4_loop as $level_4) {///level 4


                    $level_5_loop = $this->MemberModel->GetChildMemberById($level_4['id']);
                    $NetSaleVolume5 = $this->MemberModel->NetSaleVolume($level_4['id']);
                    $total_net_sale_v4[] = $NetSaleVolume4;

                    $arr_level_5 = [];
                    $total_net_sale_v5 = [];
                    foreach ($level_5_loop as $level_5) {///level 5


                        $level_6_loop = $this->MemberModel->GetChildMemberById($level_5['id']);
                        $NetSaleVolume6 = $this->MemberModel->NetSaleVolume($level_5['id']);
                        $total_net_sale_v5[] = $NetSaleVolume6;

                        $arr_level_6 = [];
                        $total_net_sale_v6 = [];
                        foreach ($level_6_loop as $level_6) {///level 6


                            $level_7_loop = $this->MemberModel->GetChildMemberById($level_6['id']);
                            $NetSaleVolume7 = $this->MemberModel->NetSaleVolume($level_6['id']);
                            $total_net_sale_v6[] = $NetSaleVolume7;
                            $arr_level_7 = [];

                            $total_net_sale_v7 = [];
                            foreach ($level_7_loop as $level_7) {///level 7


                                $NetSaleVolume8 = $this->MemberModel->NetSaleVolume($level_7['id']);
                                $total_net_sale_v7[] = $NetSaleVolume8;


                                $arr_level_7[] = ['ibo' => $level_7['name'] . ' [' . $level_7['id'] . ']', 'bv' => $NetSaleVolume8];
                            }//Level6
                            //
                            $arr_level_6[] = ['ibo' => $level_6['name'] . ' [' . $level_6['id'] . ']', 'bv' => $NetSaleVolume7, 'children' => $arr_level_7];
                        }//Level6

                        $arr_level_5[] = ['ibo' => $level_5['name'] . ' [' . $level_5['id'] . ']', 'bv' => $NetSaleVolume6, 'children' => $arr_level_6];
                    }//Level5

                    $arr_level_4[] = ['ibo' => $level_4['name'] . ' [' . $level_4['id'] . ']', 'bv' => $NetSaleVolume5, 'children' => $arr_level_5
                    ];
                }//Level4

                $arr_level_3[] = ['ibo' => $level_3['name'] . ' [' . $level_3['id'] . ']', 'bv' => $NetSaleVolume4, 'children' => $arr_level_4];


            }//Level3


            $arr[] = [
                'ibo' => $row['name'] . ' [' . $row['id'] . ']',
                'bv' => $NetSaleVolume3,
                'children' => $arr_level_3,
            ];
        }//Level2

        $NetSaleVolume1 = $this->MemberModel->NetSaleVolume($id);

        $json = ['ibo' => $member['name'] . ' [' . $member['id'] . ']', 'bv' => $NetSaleVolume1,
            'children' => $arr
        ];

        //echo '<pre>';
        //print_r($json);
        echo json_encode([$json]);

    }

    public function treeJson()
    {
        $id = $this->OuthModel->Encryptor('decrypt', $this->input->get('id'));
        $type = $this->input->get('type');

        $member = $this->UserModel->GetUserDataById1($id);

        log_message('debug', 'Find Member: ' . json_encode($member));

        $treeNode = $this->_buildNode($member, true);

        $tree = $this->_buildTree($treeNode, $type);
        header('Content-Type: application/json');
        echo json_encode($tree);
    }

    private function _buildTree($node, $type)
    {
        if($type == 'binary'){
            $children = $this->MemberModel->GetBinaryChildMemberById($node->id);
        } else {
            $children = $this->MemberModel->GetChildMemberBySponsorId($node->id);
        }

        if ($children) {
            $node->children = [];
            foreach ($children as $child) {
                log_message('debug', 'Find Child: ' . json_encode($child));
                $member = $this->UserModel->GetUserDataById1($child['id']);
                $treeChildNode = $this->_buildNode($member, true);

                $childNode = $this->_buildTree($treeChildNode, $type);
                if ($childNode) {
                    array_push($node->children, $treeChildNode);
                }
            }
        }

        return $node;
    }

    private function _userImage($url){
        if (!empty($url)) {
            return base_url('uploads/profiles/' . $url);
        } else {
            return base_url('public/images/user-icon.jpg');
        }
    }

    private function _buildNode($node, $isObject)
    {
        $treeChildNode = new stdClass();
        if ($isObject) {
            $treeChildNode->id = $node->id;
            $treeChildNode->image = $this->_userImage($node->picture_url);
            $treeChildNode->text = new stdClass();
            $treeChildNode->text->name = $node->name;
            $treeChildNode->text->mobile = $node->mobile_no;
            $treeChildNode->text->email = $node->email;
            $treeChildNode->text->address = $node->address;
        } else {
            $treeChildNode->id = isset($node['id']) ? $node['id'] : '';
            $treeChildNode->image = $this->_userImage($node['picture_url']);
            $treeChildNode->name = $node['name'];
            $treeChildNode->mobile = isset($node['mobile_no']) ? $node['mobile_no'] : '';
            $treeChildNode->email = isset($node['email']) ? $node['email'] : '';
            $treeChildNode->address = isset($node['address']) ? $node['address'] : '';
        }

        return $treeChildNode;
    }

    public function Parent()
    {
        if ($this->session->userdata['Admin']['role'] == 'Admin') {
            $id = $this->OuthModel->Encryptor('decrypt', $this->input->get('id'));
        } else {
            $id = $this->session->userdata['Admin']['id'];
        }


        $member = $this->UserModel->GetUserDataById($id);

        $getChildMember = $this->MemberModel->GetChildMemberById($id);

        $arr = [];

        foreach ($getChildMember as $row) {///level 2
            $NetSaleVolume3 = $this->MemberModel->NetSaleVolume($row['id']);
            $arr[] = [
                'ibo' => $row['name'] . ' [' . $row['id'] . ']',
                'imgUrl' => $this->UserModel->MemberPictureUrl($row['id']),
                'bv' => $NetSaleVolume3,
                'children' => $this->Children($row['id']),
            ];
        }
        $NetSaleVolume1 = $this->MemberModel->NetSaleVolume($id);
        $json = ['ibo' => $member['name'] . ' [' . $member['id'] . ']',
            'imgUrl' => $this->UserModel->MemberPictureUrl($member['id']),
            'bv' => $NetSaleVolume1,
            'children' => $arr
        ];

        //echo '<pre>';
        //print_r($json);
        echo json_encode([$json]);


    }

    public function Children($id)
    {

        $getChildMember = $this->MemberModel->GetChildMemberById($id);

        $arr = [];

        foreach ($getChildMember as $row) {///level 2
            $NetSaleVolume3 = $this->MemberModel->NetSaleVolume($row['id']);
            $arr[] = [
                'ibo' => $row['name'] . ' [' . $row['id'] . ']',
                'imgUrl' => $this->UserModel->MemberPictureUrl($row['id']),
                'bv' => $NetSaleVolume3,
                'children' => $this->Children($row['id']),
            ];
        }
        return $arr;
    }


}
