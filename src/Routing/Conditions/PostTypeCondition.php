<?php
/**
 * @package   WPEmerge
 * @author    Atanas Angelov <atanas.angelov.dev@gmail.com>
 * @copyright 2018 Atanas Angelov
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0
 * @link      https://wpemerge.com/
 */

namespace WPEmerge\Routing\Conditions;

use WPEmerge\Requests\Request;

/**
 * Check against the current post's type
 *
 * @codeCoverageIgnore
 */
class PostTypeCondition implements ConditionInterface {
	/**
	 * Post type to check against
	 *
	 * @var string
	 */
	protected $post_type = '';

	/**
	 * Constructor
	 *
	 * @param string $post_type
	 */
	public function __construct( $post_type ) {
		$this->post_type = $post_type;
	}

	/**
	 * {@inheritDoc}
	 */
	public function isSatisfied( Request $request ) {
		return ( is_singular() && $this->post_type === get_post_type() );
	}

	/**
	 * {@inheritDoc}
	 */
	public function getArguments( Request $request ) {
		return [$this->post_type];
	}
}
