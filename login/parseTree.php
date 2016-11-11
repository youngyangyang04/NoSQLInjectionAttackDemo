<?php
namespace control;
class ParseTree{
	public $value;                 // 节点值
	public $is_end = false;        // 是否为结束--是否为某个单词的结束节点
	public $childNode = array();   // 子节点
	/* 添加孩子节点--注意：可以不为引用函数，因为PHP对象赋值本身就是引用赋值 */
	public function &addChildNode($value, $is_end = false){
		$node = $this->searchChildNode($value);
		if(empty($node)){
			// 不存在节点，添加为子节点
			$node = new ParseTree();
			$node->value = $value;
			$this->childNode[] = $node;
		}
		$node->is_end = $is_end;
		return $node;
	}
	
	/* 查询子节点 */
	public function searchChildNode($value){
		foreach ($this->childNode as $k => $v) {
			if($v->value == $value){
				// 存在节点，返回该节点
				return $this->childNode[$k];
			}
		}
		return false;
	}
	
	
	
	
	/* 添加字符串 */
	function addString(&$head, $str){
		$node = null;
		for ($i=0; $i < strlen($str); $i++) {
			if($str[$i] != ' '){
				$is_end = $i != (strlen($str) - 1) ? false : true;
				if($i == 0){
					$node = $head->addChildNode($str[$i], $is_end);
				}else{
					$node = $node->addChildNode($str[$i], $is_end);
				}
			}
		}
	}
	
	/* 获取所有字符串--递归 */
	function getChildString($node, $str_array = array(), $str = ''){
		if($node->is_end == true){
			$str_array[] = $str;
		}
		if(empty($node->childNode)){
			return $str_array;
		}else{
			foreach ($node->childNode as $k => $v) {
				$str_array = getChildString($v, $str_array, $str . $v->value);
			}
			return $str_array;
		}
	}
	
	/* 搜索 */
	function searchString($node, $str){
		for ($i=0; $i < strlen($str); $i++) {
			if($str[$i] != ' '){
				$node = $node->searchChildNode($str[$i]);
				// print_r($node);
				if(empty($node)){
					// 不存在返回空
					return false;
				}
			}
		}
		return getChildString($node);
	}
	function parseTree($string){
		
		if(strpos($string,'$gt') || (strpos($string,'//')) || strpos($string,'$ne') || strpos($string,'$lt') || strpos($string,'$lte') || strpos($string,'$gte'))  return true;
		else return false;
		
	}
}