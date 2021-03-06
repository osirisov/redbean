<?php

namespace RedBeanPHP\Cursor;

use RedBeanPHP\Cursor as Cursor;

/**
 * PDO Database Cursor
 *
 * @file    RedBeanPHP/Cursor/PDOCursor.php
 * @desc    Implementation of PDO Database Cursor
 * @author  Gabor de Mooij and the RedBeanPHP Community
 * @license BSD/GPLv2
 *
 * (c) G.J.G.T. (Gabor) de Mooij and the RedBeanPHP Community.
 * This source file is subject to the BSD/GPLv2 License that is bundled
 * with this source code in the file license.txt.
 */
class PDOCursor implements Cursor {
	/**
	 * @var \PDOStatement
	 */
	protected $res;

	/**
	 * @var string
	 */
	protected $fetchStyle;

	/**
	 * Constructor, creates a new instance of a PDO Database Cursor.
	 *
	 * @param \PDOStatement $res        the PDO statement
	 * @param string        $fetchStyle fetch style constant to use
	 *
	 * @return void
	 */
	public function __construct( \PDOStatement $res, $fetchStyle )
	{
		$this->res = $res;
		$this->fetchStyle = $fetchStyle;
	}

	/**
	 * @see Cursor::getNextItem
	 */
	public function getNextItem()
	{
		return $this->res->fetch();
	}

	/**
	 * @see Cursor::close
	 */
	public function close()
	{
		$this->res->closeCursor();
	}
}
