( function( blocks ) {
    const { registerBlockVariation } = blocks;
    
    registerBlockVariation('coblocks/counter', {
        name: 'pledge-counter',
        title: 'Pledge Counter',
        description: 'Display the current pledge count',
        attributes: {
            counterText: igbBlockData.pledgeCount,
            isPledgeCounter: true
        },
        isActive: attributes => attributes.isPledgeCounter === true,
        transforms: {
            from: [{
                type: 'block',
                blocks: ['coblocks/counter'],
                transform: attributes => {
                    return blocks.createBlock('coblocks/counter', {
                        ...attributes,
                        counterText: igbBlockData.pledgeCount,
                        isPledgeCounter: true
                    });
                }
            }]
        },
        isDefault: false,
        scope: ['inserter', 'transform']
    });
} )( window.wp.blocks ); 